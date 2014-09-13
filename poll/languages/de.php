<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Umfragen",
	'poll:add' => "Neue Umfrage",
	'poll:group_poll' => "Gruppen-Umfragen",
	'poll:group_poll:listing:title' => "Umfragen von %s",
	'poll:your' => "Deine Umfragen",
	'poll:not_me' => "Umfragen von %s",
	'poll:friends' => "Umfragen von Freunden",
	'poll:addpost' => "Neue Umfrage starten",
	'poll:editpost' => "Bearbeiten einer Umfrage: %s",
	'poll:edit' => "Bearbeiten einer Umfrage",
	'item:object:poll' => 'Umfragen',
	'item:object:poll_choice' => "Auswahlmöglichkeiten",
	'poll:question' => "Frage",
	'poll:description' => "Beschreibung (optional)",
	'poll:responses' => "Auswahlmöglichkeiten",
	'poll:show_results' => "Zeige die Ergebnisse",
	'poll:show_poll' => "Zeige die Umfrage",
	'poll:add_choice' => "Auswahlmöglichkeit hinzufügen",
	'poll:delete_choice' => "Diese Auswahlmöglichkeit löschen",
	'poll:close_date' => "Schlusstag für diese Umfrage (optional)",
	'poll:voting_ended' => "Die Abstimmung in dieser Umfrage endete am %s.",
	'poll:poll_closing_date' => "(Schlusstag der Umfrage: %s)",

	'poll:convert:description' => 'ACHTUNG: es sind %s existierende Umfragen vorhanden, die noch die alten Datenstruktur für die Auswahlmöglichkeiten verwenden. Diese Umfragen werden mit dieser Version des Umfrage-Plugins nicht korrekt funktionieren.',
	'poll:convert' => 'Vorhandene Umfragen jetzt aktualisieren',
	'poll:convert:confirm' => 'Diese Aktualisierung ist irreversibel. Bist Du sicher, dass Du die Datenstruktur der Auswahlmöglichkeiten dieser Umfragen jetzt konvertieren willst?',

	'poll:settings:group:title' => "Gruppen-Umfragen erlauben?",
	'poll:settings:group_poll_default' => "ja, standardmäßig aktiviert",
	'poll:settings:group_poll_not_default' => "ja, standardmäßig deaktiviert",
	'poll:settings:no' => "nein",
	'poll:settings:group_access:title' => "Wenn Gruppen-Umfragen aktiviert sind, wem soll das Hinzufügen neuer Umfragen erlaubt sein?",
	'poll:settings:group_access:admins' => "nur dem Gründer der Gruppe und Admins",
	'poll:settings:group_access:members' => "allen Mitgliedern der Gruppe",
	'poll:settings:front_page:title' => "Admins ermöglichen, eine einzelne Umfrage zur aktuellen \"Umfrage der Stunde\" der Community-Seite zu machen? (das Widget Manager-Plugin ist notwendig, damit das dazugehörige Widget zur Indexseite hinzugefügt werden kann)",
	'poll:settings:allow_close_date:title' => "Befristete Umfragen erlauben? (nach Ablauf der Frist sind die Ergebnisse der Umfrage weiterhin sichtbar aber eine Stimmabgabe ist nicht mehr möglich)",
	'poll:settings:allow_open_poll:title' => "Offene Umfragen erlauben? (Bei offenen Umfragen ist sichtbar, welche Mitglieder welche Antwort gewählt haben; wenn diese Option aktiviert ist, können Admins bei allen Umfragen sehen, wer wie gewählt hat)",
	'poll:none' => "Keine Umfragen gefunden.",
	'poll:permission_error' => "Du hast keine ausreichende Berechtigung, um diese Umfrage zu bearbeiten.",
	'poll:vote' => "Abstimmen",
	'poll:login' => "Bitte melde Dich auf der Community-Seite an, wenn Du in dieser Umfrage Deine Stimme abgeben willst.",
	'group:poll:empty' => "Keine Umfragen",
	'poll:settings:site_access:title' => "Wer darf seiten-weite Umfragen hinzufügen?",
	'poll:settings:site_access:admins' => "nur Admins",
	'poll:settings:site_access:all' => "alle angemeldeten Mitglieder",
	'poll:can_not_create' => "Du hast keine ausreichende Berechtigung, um eine neue Umfrage hinzuzufügen.",
	'poll:front_page_label' => "Diese Umfrage zur aktuellen \"Umfrage der Stunde\" machen",
	'poll:open_poll_label' => "Zeige in den Ergebnissen, welche Mitglieder für was gestimmt haben (offene Umfrage)",
	'poll:show_voters' => "Zeige Umfrageteilnehmer",

	/**
	 * Poll widget
	 **/
	'poll:latest_widget_title' => "Neueste Umfragen",
	'poll:latest_widget_description' => "Zeigt die derzeit neuesten Umfragen an.",
	'poll:latestgroup_widget_title' => "Neueste Gruppen-Umfragen",
	'poll:latestgroup_widget_description' => "Zeigt die derzeit neuesten Umfragen der Gruppe an.",
	'poll:my_widget_title' => "Meine Umfragen",
	'poll:my_widget_description' => "Dieses Widget zeigt die derzeit neuesten, von Dir hinzugefügten Umfragen an.",
	'poll:widget:label:displaynum' => "Wie viele Umfragen möchtest Du anzeigen?",
	'poll:individual' => "Umfrage der Stunde",
	'poll_individual:widget:description' => "Zeigt die aktuelle \"Umfrage der Stunde\" an.",
	'poll:widget:no_poll' => "Es gibt noch keine Umfragen von %s.",
	'poll:widget:nonefound' => "Keine Umfragen gefunden.",
	'poll:widget:think' => "Lass %s wissen, was Du denkst!",
	'poll:enable_poll' => "Umfragen aktivieren",
	'poll:noun_response' => "Stimme",
	'poll:noun_responses' => "Stimmen",
	'poll:settings:yes' => "ja",
	'poll:settings:no' => "nein",

	'poll:month:01' => 'Januar',
	'poll:month:02' => 'Februar',
	'poll:month:03' => 'März',
	'poll:month:04' => 'April',
	'poll:month:05' => 'Mai',
	'poll:month:06' => 'Juni',
	'poll:month:07' => 'Juli',
	'poll:month:08' => 'August',
	'poll:month:09' => 'September',
	'poll:month:10' => 'Oktober',
	'poll:month:11' => 'November',
	'poll:month:12' => 'Dezember',

	/**
	 * Notifications
	 **/
	'poll:new' => 'Eine neue Umfrage',
	'poll:notify:summary' => 'Neue Umfrage namens %s',
	'poll:notify:subject' => 'Neue Umfrage: %s',
	'poll:notify:body' =>
'
%s hat eine neue Umfrage gestartet:

%s

Schau Dir die Umfrage an und gib Deine Stimme ab:
%s
',

	/**
	 * Poll river
	 **/
	'poll:settings:create_in_river:title' => "Einen Eintrag im Aktivitäten-River beim Hinzufügen einer neuen Umfrage erzeugen?",
	'poll:settings:vote_in_river:title' => "Einen Eintrag im Aktivitäten-River erzeugen, wenn ein Mitglied seine Stimme in einer Umfrage abgegeben hat?",
	'poll:settings:send_notification:title' => "Beim Hinzufügen einer Umfrage Benachrichtigungen versenden? (Mitglieder erhalten nur Benachrichtigungen, wenn sie entweder mit dem Mitglied befreundet sind, der die Umfrage gestartet hat oder Mitglied der Gruppe sind, zu der die Umfrage hinzugefügt wurde. Darüber hinaus müssen sie die Benachrichtigungseinstellungen von Elgg entsprechend konfiguriert haben)",
	'river:create:object:poll' => '%s hat die Umfrage %s gestartet',
	'river:vote:object:poll' => '%s hat in der Umfrage %s abgestimmt',
	'river:comment:object:poll' => '%s schrieb einen Kommentar zur Umfrage %s',

	/**
	 * Status messages
	 */
	'poll:added' => "Deine Umfrage wurde hinzugefügt.",
	'poll:edited' => "Deine Änderungen wurden gespeichert.",
	'poll:responded' => "Danke fürs Abstimmen. Deine Stimme wurde erfasst.",
	'poll:deleted' => "Die Umfrage wurde gelöscht.",
	'poll:totalvotes' => "Gesamtzahl der abgegebenen Stimmen: ",
	'poll:voted' => "Deine Stimme wurde erfasst. Danke für die Beteiligung in dieser Umfrage.",

	/**
	 * Error messages
	 */
	'poll:blank' => "Entschuldigung: Du mußt sowohl im Frage-Eingabefeld etwas eintragen und auch mindestens eine Auswahlmöglichkeit für die Umfrage hinzufügen.",
	'poll:novote' => "Entschuldigung: Du mußt eine der angebotenen Auswahlmöglichkeiten selektieren, wenn Du in dieser Umfrage Deine Stimme abgeben willst.",
	'poll:notfound' => "Entschuldigung: die gewünschte Umfrage konnte nicht gefunden werden.",
	'poll:notdeleted' => "Entschuldigung: beim Löschen der Umfrage ist ein Fehler aufgetreten."
);