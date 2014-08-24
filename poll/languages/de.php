<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Umfragen",
	'poll:add' => "Neue Umfrage",
	'poll:votes' => "Stimmen",
	'poll:user' => "Umfragen von %s",
	'poll:group_poll' => "Gruppen-Umfragen",
	'poll:group_poll:listing:title' => "Umfragen von %s",
	'poll:user:friends' => "Umfragen der Freunde von %s",
	'poll:your' => "Deine Umfragen",
	'poll:not_me' => "Umfragen von %s",
	'poll:posttitle' => "Umfragen von %s: %s",
	'poll:friends' => "Umfragen von Freunden",
	'poll:not_me_friends' => "Umfragen von Freunden von %s",
	'poll:yourfriends' => "Die neuesten Umfragen Deiner Freunde",
	'poll:everyone' => "Alle Umfragen",
	'poll:addpost' => "Neue Umfrage starten",
	'poll:editpost' => "Bearbeiten einer Umfrage: %s",
	'poll:edit' => "Bearbeiten einer Umfrage",
	'poll:text' => "Text der Umfrage",
	'poll:strapline' => "%s",
	'item:object:poll' => 'Umfragen',
	'item:object:poll_choice' => "Wahlmöglichkeiten",
	'poll:question' => "Frage",
	'poll:description' => "Beschreibung (optional)",
	'poll:responses' => "Wahlmöglichkeiten",
	'poll:results' => "[+] Zeige die Ergebnisse",
	'poll:show_results' => "Zeige die Ergebnisse",
	'poll:show_poll' => "Zeige die Umfrage",
	'poll:add_choice' => "Wahlmöglichkeit hinzufügen",
	'poll:delete_choice' => "Diese Wahlmöglichkeit löschen",

	'poll:convert:description' => 'ACHTUNG: es sind %s existierende Umfragen vorhanden, die noch die alten Datenstruktur für die Wahlmöglichkeiten verwenden. Diese Umfragen werden mit dieser Version des Umfrage-Plugins nicht korrekt funktionieren.',
	'poll:convert' => 'Vorhandene Umfragen jetzt aktualisieren',
	'poll:convert:confirm' => 'Diese Aktualisierung ist irreversibel. Bist Du sicher, dass Du die Wahlmöglichkeiten dieser Umfragen jetzt konvertieren willst?',

	'poll:settings:group:title' => "Gruppen-Umfragen erlauben?",
	'poll:settings:group_poll_default' => "ja, standardmäßig aktiviert",
	'poll:settings:group_poll_not_default' => "ja, standardmäßig deaktiviert",
	'poll:settings:no' => "nein",
	'poll:settings:group_access:title' => "Wenn Gruppen-Umfragen aktiviert sind, wem soll das Hinzufügen neuer Umfragen erlaubt sein?",
	'poll:settings:group_access:admins' => "nur dem Gründer der Gruppe und Admins",
	'poll:settings:group_access:members' => "allen Mitgliedern der Gruppe",
	'poll:settings:front_page:title' => "Admins ermöglichen, eine einzelne Umfrage zur aktuellen \"Umfrage der Stunde\" der Community-Seite zu machen? (das Widget Manager-Plugin ist notwendig, damit das dazugehörige Widget zur Indexseite hinzugefügt werden kann)",
	'poll:none' => "Keine Umfragen gefunden.",
	'poll:permission_error' => "Du hast keine ausreichende Berechtigung, um diese Umfrage zu bearbeiten.",
	'poll:vote' => "Abstimmen",
	'poll:login' => "Bitte melde Dich auf der Community-Seite an, wenn Du in dieser Umfrage Deine Stimme abgeben willst.",
	'group:poll:empty' => "Keine Umfragen",
	'poll:settings:site_access:title' => "Wer darf seiten-weite Umfragen hinzufügen?",
	'poll:settings:site_access:admins' => "nur Admins",
	'poll:settings:site_access:all' => "alle angemeldeten Mitglieder",
	'poll:can_not_create' => "Du hast keine ausreichende Berechtigun, um eine neue Umfrage hinzuzufügen.",
	'poll:front_page_label' => "Diese Umfrage zur aktuellen \"Umfrage der Stunde\" machen",

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
	'poll:group_identifier' => "(in %s)",
	'poll:noun_response' => "Stimme",
	'poll:noun_responses' => "Stimmen",
	'poll:settings:yes' => "ja",
	'poll:settings:no' => "nein",

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
	'poll:save:failure' => "Beim Speichern Deiner Umfrage ist ein Fehler aufgetreten. Bitte versuche es noch einmal.",
	'poll:blank' => "Entschuldigung: Du mußt sowohl im Frage-Eingabefeld etwas eintragen und auch Wahlmöglichkeiten für die Umfrage hinzufügen.",
	'poll:novote' => "Entschuldigung: Du mußt eine der angebotenen Wahlmöglichkeiten selektieren, wenn Du in dieser Umfrage Deine Stimme abgeben willst.",
	'poll:notfound' => "Entschuldigung: die gewünschte Umfrage konnte nicht gefunden werden.",
	'poll:nonefound' => "Keine Umfragen von %s gefunden.",
	'poll:notdeleted' => "Entschuldigung: beim Löschen der Umfrage ist ein Fehler aufgetreten."
);