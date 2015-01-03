<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Kyselyt",
	'poll:add' => "Uusi kysely",
	'poll:group_poll' => "Ryhmän kyselyt",
	'poll:group_poll:listing:title' => "Käyttäjän %s kyselyt",
	'poll:your' => "Omat kyselysi",
	'poll:not_me' => "Käyttäjän %s kyselyt",
	'poll:friends' => "Ystäviesi kyselyt",
	'poll:addpost' => "Luo uusi kysely",
	'poll:editpost' => "Muokkaa kyselyä: %s",
	'poll:edit' => "Muokkaa kyselyä",
	'item:object:poll' => 'Kyselyt',
	'item:object:poll_choice' => "Vaihtoehdot",
	'poll:question' => "Kyselyn nimi",
	'poll:description' => "Kuvaus",
	'poll:responses' => "Vastausvaihtoehdot",
	'poll:result:label' => "%s (%s)",
	'poll:show_results' => "Näytä tulokset",
	'poll:show_poll' => "Näytä kysely",
	'poll:add_choice' => "Lisää uusi vaihtoehto",
	'poll:delete_choice' => "Poista tämä vaihtoehto",
	'poll:close_date' => "Kyselyn päättymispäivä",
	'poll:voting_ended' => "Äänestys sulkeutui %s.",
	'poll:poll_closing_date' => "(Kyselyn sulkeutumisajankohta: %s)",

	'poll:convert:description' => 'VAROITUS: Löydettiin %s kyselyä, jotka eivät ole yhteensopivia nykyisen version kanssa.',
	'poll:convert' => 'Päivitä kyselyt',
	'poll:convert:confirm' => 'Päivitystä ei voi perua. Haluatko varmasti päivittää kyselyt?',

	'poll:settings:group:title' => "Salli ryhmien kyselyt?",
	'poll:settings:group_poll_default' => "Kyllä",
	'poll:settings:group_poll_not_default' => "Ei",
	'poll:settings:no' => "Ei",
	'poll:settings:group_access:title' => "Kuva voi luoda kyselyitä ryhmiin?",
	'poll:settings:group_access:admins' => "Ryhmien omistajat sekä sivuston ylläpitäjät",
	'poll:settings:group_access:members' => "Ryhmän jäsenet",
	'poll:settings:front_page:title' => 'Ota käyttöön mahdollisuus tehdä kyselystä "Päivän kysely"? (Vaatii Widget manager -pluginin.)',
	'poll:settings:allow_close_date:title' => "Ota käyttöön kyselyn sulkeutumispäivä?",
	'poll:settings:allow_open_poll:title' => "Ota käyttöön avoimet kyselyt? (Näyttää vastausten kohdalla niihin vastanneet henkilöt)",
	'poll:none' => "Ei kyselyitä",
	'poll:permission_error' => "Sinulla ei ole oikeuksia tämän kyselyn muokkaamiseen",
	'poll:vote' => "Vastaa",
	'poll:login' => "Kirjaudu sisään vastataksesi tähän kyselyyn",
	'group:poll:empty' => "Ei kyselyitä",
	'poll:settings:site_access:title' => "Kuka voi luoda sivustonlaajuisia kyselyitä?",
	'poll:settings:site_access:admins' => "Vain ylläpitäjät",
	'poll:settings:site_access:all' => "Sisäänkirjautuneet käyttäjät",
	'poll:can_not_create' => "Sinulla ei ole oikeuksia luoda uutta kyselyä",
	'poll:front_page_label' => 'Tee tästä "Päivän kysely"',
	'poll:open_poll_label' => "Näytä tuloksien yhteydessä, kuka on vastannut mihinkin kysymykseen",
	'poll:show_voters' => "Näytä vastaajat",

	/**
	 * Poll widget
	 */
	'poll:latest_widget_title' => "Uusimmat kyselyt",
	'poll:latest_widget_description' => "Näyttää sivuston viimeisimmät kyselyt",
	'poll:latestgroup_widget_title' => "Ryhmän uusimmat kyselyt",
	'poll:latestgroup_widget_description' => "Näyttää ryhmän viimeisimmät kyselyt",
	'poll:my_widget_title' => "Omat kyselyni",
	'poll:my_widget_description' => "Näyttää omat kyselysi",
	'poll:widget:label:displaynum' => "Näytettävien kyselyiden määrä",
	'poll:individual' => "Päivän kysely",
	'poll_individual:widget:description' => "Näyttää päivän kyselyn",
	'poll:widget:no_poll' => "%s ei ole vielä luonut kyselyitä.",
	'poll:widget:nonefound' => "Ei kyselyitä.",
	'poll:widget:think' => "Vastaa käyttäjän %s kyselyihin!",
	'poll:enable_poll' => "Ota käytöön ryhmän kyselyt",
	'poll:noun_response' => "ääni",
	'poll:noun_responses' => "ääntä",
	'poll:settings:yes' => "Kyllä",
	'poll:settings:no' => "Ei",

	'poll:month:01' => 'Tammikuuta',
	'poll:month:02' => 'Helmikuuta',
	'poll:month:03' => 'Maaliskuuta',
	'poll:month:04' => 'Huhtikuuta',
	'poll:month:05' => 'Toukokuuta',
	'poll:month:06' => 'Kesäkuuta',
	'poll:month:07' => 'Heinäkuuta',
	'poll:month:08' => 'Elokuuta',
	'poll:month:09' => 'Syyskuuta',
	'poll:month:10' => 'Lokakuuta',
	'poll:month:11' => 'Marraskuuta',
	'poll:month:12' => 'Joulukuuta',

	/**
	 * Notifications
	 */
	'poll:new' => 'Uusi kysely',
	'poll:notify:summary' => 'Uusi kysely: %s',
	'poll:notify:subject' => 'Uusi kysely: %s',
	'poll:notify:body' => '%s on luonut uuden kyselyn: %s

Vastaa kyselyyn täällä: %s
',

	/**
	 * Poll river
	 */
	'poll:settings:create_in_river:title' => "Näytä uudet kyselyt toimintalistauksessa?",
	'poll:settings:vote_in_river:title' => "Näytä yksittäiset äänet toimintalistauksessa?",
	'poll:settings:send_notification:title' => "Lähetä ilmoitukset uusista kyselyistä?",
	'river:create:object:poll' => '%s loi kyselyn %s',
	'river:vote:object:poll' => '%s vastasi kyselyyn %s',
	'river:comment:object:poll' => '%s kommentoi kyselyä %s',

	/**
	 * Status messages
	 */
	'poll:added' => "Lisättiin uusi kysely",
	'poll:edited' => "Kysely tallennettu",
	'poll:responded' => "Ääni tallennettu. Kiitos vastauksestasi.",
	'poll:deleted' => "Kysely poistettu",
	'poll:totalvotes' => "Vastausten kokonaismäärä: %s",
	'poll:voted' => "Ääni tallennettu. Kiitos vastauksestasi.",

	/**
	 * Error messages
	 */
	'poll:blank' => "Syötä vähintään nimi sekä yksi vastausvaihtoehto",
	'poll:novote' => "Valitse jokin vastausvaihtoehdoista",
	'poll:alreadyvoted' => "Olet vastannut tähän kyselyyn jo aiemmin",
	'poll:notfound' => "Kyselyä ei löytynyt",
	'poll:notdeleted' => "Kyselyn poistaminen epäonnistui",
);