<?php

$guid = (int) get_input('guid');

echo poll_get_page_view($guid);
