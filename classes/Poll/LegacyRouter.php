<?php

namespace Poll;

class LegacyRouter {

    public function __invoke(\Elgg\Request $request) {
        $path = $request->getPath();

        $segments = explode('/', $path);
        

        switch ($segments[0]) {
            case 'poll':
                return self::pollRouter($segments);
            break;
            case 'polls':
                return self::pollsRouter($segments);
            break;
            default:
            return elgg_error_response('Invalid Path');
            break;
        }
    }

    private function pollRouter($segments) {
        $url = current_page_url();
        $parts = parse_url($url);

        // forward /poll/read/{guid} => /poll/view/{guid}
        if ($segments[1] == 'read') {    
            $pos = strpos($parts['path'], 'read');
            if ($pos !== false) {
                $parts['path'] = substr_replace($parts['path'], 'view', $pos, 4);
            }
        
            $new_url = elgg_http_build_url($parts);
            return elgg_redirect_response($new_url);
        }
    
        // forward /poll/{username} => /poll/owner/{username}
        if (!in_array($segments[1], $reserved)) {
            // not part of our normal routing
            $user = get_user_by_username($segments[1]);
            if ($user) {
                $pos = strpos($parts['path'], 'poll/' . $user->username);
                if ($pos !== false) {
                    $parts['path'] = substr_replace($parts['path'], 'poll/owner/' . $user->username, $pos, strlen('poll/' . $user->username));
                }
        
                $new_url = elgg_http_build_url($parts);
                return elgg_redirect_response($new_url);
            }
        }
    }


    // redirect /polls/* => /poll/*
    private function pollsRouter($segments) {
        $url = current_page_url();
	    $parts = parse_url($url);

	    $pos = strpos($parts['path'], 'polls');
	    if ($pos !== false) {
    		$parts['path'] = substr_replace($parts['path'], 'poll', $pos, 5);
	    }
	
	    $new_url = elgg_http_build_url($parts);
	    return elgg_redirect_response($new_url);
    }
}