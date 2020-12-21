# Flexxter
Task for Working Student Backend: Garros Sado

## Projektziel
    Bei diesem Projekt ging es darum, meine grundlegende Entwicklungskenntnisse mit der objektorientierten Programmiersprache PHP zu testen und auch zu sehen, wie weit mein Denken gehen kann und wie ich Kommentäre einsetze. Um dieses Projekt zu realisieren, habe ich die verschiedenen Sprachen un Framework benutzen
* HTML, CSS und Framework Bootstrap für das Frontend
* php PDO für das Backend

## Autor
    Sado Garros,   garros.sado@gmail.com

## Grundstruktur
1. Home Seite
2. Machines Seite
3. User Seite

## Sektionen gewartet
* Header(navigation)
* Footer

## Home Seite
    Die home Seite ist für uns in diese Aufgabe nicht so wichtig. Deswegen habe ich diese nicht kodiert. aber wenn ich es codiert hätte, hätte ich eine Schnittstelle zum Anlegen eines Mitarbeiterkontos und zum anschließenden Einloggen eingebaut.

## Machines Seite
    Diese Seite enthält alle in der Datenbank befindlichen Maschinen, die in zwei Kategorien eingeteilt sind und die auf einem bestimmten Mitarbeiter basieren. Links sind die Maschinen, die von einem bestimmten Mitarbeiter noch nicht ausgeliehen wurden, und rechts sind die Maschinen, die von demselben Mitarbeiter bereits ausgeliehen wurden.

* Links unter jeder Maschinenbeschreibung befindet sich eine Schaltflaeche Ausleihen. Mit einem Klick auf diesen hat der besagte Mitarbeiter eine Leihgabe getaetigt, und wenn dies geschehen ist, geht diese Maschine direkt auf die rechte Seite und bekommt den Button Rueckgabe, um die Uebergabe der Maschine zu machen.

*  Durch die gleiche Prozedur auf der rechten Seite durch Anklicken der Schaltflaeche Rueckgabe bedeutet es, dass der besagte Mitarbeiter die Maschine uebergeben hat und dieser geht direkt nach links und erhaelt die Schaltflaeche Ausleihen.

## User Seite
    Diese Seite gibt alle Geräte zurück, die vom Mitarbeiter Sandy ausgeliehen wurden. Dazu habe ich die Tabellen-Joins verwendet. Darauf komme ich in den nächsten Zeilen zurück, wenn ich über die Datenbank spreche.

## Database
    Die Flexxter sql-Datei enthält die Datenbank, in der sich drei Tabellen befinden. 
1. tblemployees: Diese Tabelle hat drei Attribute und gibt Informationen über einen Mitarbeiter

2. tblmachines: Die Tabelle hat vier Attribute und gibt Informationen über eine Maschine.Unter diesen Attributen haben wir das Attribut Status vom Typ booleén , das den aktuellen Status einer Maschine angibt. (1, um zu sagen, dass eine Maschine verfügbar ist, daher die Schaltfläche Ausleihen auf der Seite Maschine der Anwendung und 0 für das Gegenteil)

3. tblausleihen:  Diese Tabelle liefert alle notwendigen Informationen, um in Zukunft eine Rückverfolgbarkeit zu verwalten, d.h. um zu wissen, von wem und wann eine Maschine ausgeliehen und übergeben wurde. Um die dritte Frage der Übung zu lösen, habe ich die beiden vorherigen Tabellen mit dieser Tabelle verbunden, um das erwartete Ergebnis zu erhalten.

Dies ist die Anfrage 

 $sql =$conn->prepare("SELECT Surname, Title, Description, Datum, Typ FROM tblausleihen INNER JOIN tblemployees ON tblausleihen.Employee_fk=tblemployees.EmployeeID INNER JOIN tblmachines ON tblausleihen.Machine_fk=tblmachines.MachineID WHERE Typ=? AND Surname=? AND Datum=?");

 ## Anforderungen
* PHP server
* sql server
* Webbrowser
* Code-Editor zum Bearbeiten des Codes, falls erforderlich

## Aufgetretenes Problem
    Das einzige Problem, mit dem ich wirklich zu kämpfen hatte und das ich noch nicht ganz gelöst habe, ist die Funktion back_to_warehouse. Die Funktion selbst funktioniert gut, aber das Problem liegt in der Seitenaktualisierung. Wenn Sie auf die Schaltfläche Rückgabe klicken, wird die Aktion ausgeführt, d.h. in der Datenbank geschieht die Aktion perfekt, aber auf der Ebene der Schnittstelle der Anwendung ist es notwendig, die Seite zu aktualisieren, um zu sehen, dass die Maschine von Rückgabe für den Teil Ausleihen verlassen wird. dies ist das einzige Problem, das ich während des gesamten Projekts treffen konnte.

## Zusätzliche Herausforderung
   Dieses Projekt ist so interessant, dass ich gerne die gesamte Analyse und Entwicklung davon durchführen würde. Ich denke, dass ich dadurch wieder in der Lage sein werde, in mehreren Technologien aufzutreten. In 2015 habe ich bereits waehrend mein Praktikum ein solches Projekt durchgefuehrt, allerdings fuer eine Firmenbibliothek.
