BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "associations" (
	"idAssocia"	INTEGER NOT NULL UNIQUE,
	"nom"	TEXT NOT NULL,
	"sigle"	TEXT NOT NULL,
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idAssocia" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "paroisiens" (
	"idParois"	INTEGER NOT NULL UNIQUE,
	"association"	INTEGER NOT NULL,
	"matriculeParois"	TEXT NOT NULL UNIQUE,
	"ancienMatricule"	TEXT,
	"nom"	TEXT NOT NULL,
	"prenom"	TEXT,
	"categorie"	TEXT,
	"date_naiss"	TEXT NOT NULL,
	"lieu_naiss"	TEXT,
	"sexe"	TEXT NOT NULL,
	"telephone1"	TEXT NOT NULL,
	"telephone2"	TEXT,
	"email"	TEXT,
	"adresse"	TEXT NOT NULL,
	"date_adhesion"	TEXT NOT NULL,
	"statut"	TEXT NOT NULL,
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idParois" AUTOINCREMENT),
	FOREIGN KEY("association") REFERENCES "associations"("idAssocia") ON UPDATE CASCADE ON DELETE SET NULL
);
CREATE TABLE IF NOT EXISTS "gestionnaire" (
	"idGest"	INTEGER NOT NULL UNIQUE,
	"paroisien"	INTEGER NOT NULL,
	"accreditations"	TEXT NOT NULL,
	"login"	TEXT NOT NULL,
	"password"	TEXT NOT NULL,
	"fonction"	TEXT NOT NULL CHECK("fonction" IN ("administrateur", "responsable du commite finance", "pasteur", "assistant", "gestionnaire")),
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idGest" AUTOINCREMENT),
	FOREIGN KEY("paroisien") REFERENCES "paroisiens"("idParois") ON UPDATE CASCADE ON DELETE CASCADE
);
INSERT INTO "associations" VALUES (1,'Session','SEESEN','17-01-2023 11:16:56','',NULL,NULL);
INSERT INTO "associations" VALUES (2,'Diacre','DK','17-01-2023 11:18:27','',NULL,NULL);
INSERT INTO "associations" VALUES (3,'Association chrétienne des femmes','ACF','17-01-2023 11:20:41','','18-01-2023 08:08:53','');
INSERT INTO "associations" VALUES (4,'Association chrétienne des hommes','ACH','17-01-2023 11:21:33','',NULL,NULL);
INSERT INTO "associations" VALUES (5,'JAPE','JAPE','17-01-2023 11:22:37','',NULL,NULL);
INSERT INTO "associations" VALUES (6,'Connunauté Francophone','CF','17-01-2023 11:23:25','',NULL,NULL);
INSERT INTO "associations" VALUES (7,'Chorale TOHLA','TOHLA','17-01-2023 11:25:30','',NULL,NULL);
INSERT INTO "associations" VALUES (8,'Chorale Emmanuel','EMM','17-01-2023 11:26:15','',NULL,NULL);
INSERT INTO "associations" VALUES (9,'Chorale Foi Vie','FV','17-01-2023 11:26:50','',NULL,NULL);
INSERT INTO "associations" VALUES (11,'NNT','NNT','17-01-2023 11:27:20','',NULL,NULL);
INSERT INTO "associations" VALUES (12,'Groupe des Elèvs et Etudiants','BAUDU','17-01-2023 11:35:32','',NULL,NULL);
INSERT INTO "associations" VALUES (13,'EC','EC','18-01-2023 08:13:26','',NULL,NULL);

INSERT INTO "paroisiens" VALUES (1,4,'0001-A-83','365A','NSOA MBONDO','Pierre','menbre','1983-01-21','','Masculin','675755787',NULL,'nsoapierre@yahoo.fr','NKOLNDA','2010','actif','19-01-23 02:17:55','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (2,9,'0002-B-01','','Nanyang','Brice','ancien','2001-01-25','douala','Masculin','657807309',NULL,'nanyangbrice@gmail.com','eyang','2023','actif','19-01-23 06:55:44','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (3,4,'0003-B-93','','BASSAHAK','Jean','ancien','1993-01-22','','Masculin','611111111',NULL,'','Yaoundé','2023','actif','19-01-23 06:59:18','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (4,3,'0004-B-89','','BASSONG','Danielle Eléanor','menbre','1989-01-23','','Feminin','611111111',NULL,'','yaoundé','2023','actif','19-01-23 07:00:31','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (5,3,'0005-B-98','','BIACK','Ruben','ancien','1998-01-24','','Masculin','611111111',NULL,'','yaoundé','2019','actif','19-01-23 07:02:09','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (6,4,'0006-B-83','','ITOP','Samuel','ancien','1983-01-25','','Masculin','611111111',NULL,'','yaoundé','2023','actif','20-01-23 07:44:14','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (7,3,'0007-B-98','','MAGWETH MBEA','Ephrem Dieudonné','ancien','1998-01-24','','Masculin','611111111',NULL,'','youndé','2015','actif','20-01-23 07:48:34','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (8,3,'0008-B-97','','MAHOP','Jean Marc','ancien','1997-12-15','','Masculin','611111111',NULL,'','douala','2018','actif','20-01-23 07:49:24','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'0009-B-82','','MBOCK','Emmanuel  Noé','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "gestionnaire" VALUES (2,1,'0','4746651dafae006e675beb570a435e1a','4746651dafae006e675beb570a435e1a','gestionnaire','20-01-23 09:15:31','',NULL,NULL);
COMMIT;


BEGIN TRANSACTION;


CREATE TABLE IF NOT EXISTS "engagements" (
	"idEngagement"	INTEGER NOT NULL UNIQUE,
	"matriculEngag"	TEXT NOT NULL UNIQUE,
	"paroisien"	INTEGER NOT NULL,
	"nomParoisien"	TEXT NOT NULL,
	"prenomParoisien"	TEXT,
	"type"	TEXT NOT NULL CHECK("type" IN ("dîme", "cotisations de construction", "Offrandes des recoltes")),
	"date_debut"	TEXT NOT NULL,
	"date_fin"	TEXT NOT NULL,
	"montant"	INTEGER NOT NULL,
	"statut"	TEXT,
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idEngagement" AUTOINCREMENT),
	FOREIGN KEY("paroisien") REFERENCES "paroisiens"("idParois") ON UPDATE CASCADE ON DELETE SET NULL
);
CREATE TABLE IF NOT EXISTS "versemments" (
	"idVers"	INTEGER NOT NULL UNIQUE,
	"matriculeVers"	TEXT NOT NULL UNIQUE,
	"engagement"	TEXT NOT NULL,
	"matriculeEngag"	TEXT NOT NULL,
	"paroisien"	TEXT NOT NULL,
	"nomParoisien"	TEXT NOT NULL,
	"prenomParoisien"	TEXT,
	"date_versement"	TEXT NOT NULL,
	"evenement"	TEXT NOT NULL,
	"montant"	INTEGER NOT NULL,
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idVers"),
	FOREIGN KEY("paroisien") REFERENCES "paroisiens"("idParois") ON UPDATE CASCADE ON DELETE SET NULL,
	FOREIGN KEY("engagement") REFERENCES "engagements"("idEngagement") ON UPDATE CASCADE ON DELETE SET NULL
);
CREATE TABLE IF NOT EXISTS "gestionnaire" (
	"idGest"	INTEGER NOT NULL UNIQUE,
	"paroisien"	INTEGER NOT NULL,
	"nomParoisien"	TEXT NOT NULL,
	"prenomParoisien"	TEXT,
	"accreditations"	TEXT NOT NULL,
	"login"	TEXT NOT NULL,
	"password"	TEXT NOT NULL,
	"fonction"	TEXT NOT NULL CHECK("fonction" IN ("administrateur", "responsable du commite finance", "pasteur", "assistant", "gestionnaire")),
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idGest" AUTOINCREMENT),
	FOREIGN KEY("paroisien") REFERENCES "paroisiens"("idParois") ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS "associations" (
	"idAssocia"	INTEGER NOT NULL UNIQUE,
	"nom"	TEXT NOT NULL,
	"sigle"	TEXT NOT NULL,
	"saveAt"	TEXT NOT NULL,
	"saveBy"	TEXT,
	"updateAt"	TEXT,
	"updateBy"	TEXT,
	PRIMARY KEY("idAssocia" AUTOINCREMENT)
);
INSERT INTO "associations" VALUES (1,'Session','SEESEN','17-01-2023 11:16:56','',NULL,NULL);
INSERT INTO "associations" VALUES (2,'Diacre','DK','17-01-2023 11:18:27','',NULL,NULL);
INSERT INTO "associations" VALUES (3,'Association chrétienne des femmes','ACF','17-01-2023 11:20:41','','17-01-2023 11:49:37','');
INSERT INTO "associations" VALUES (4,'Association chrétienne des hommes','ACH','17-01-2023 11:21:33','',NULL,NULL);
INSERT INTO "associations" VALUES (5,'JAPE','JAPE','17-01-2023 11:22:37','',NULL,NULL);
INSERT INTO "associations" VALUES (6,'Connunauté Francophone','CF','17-01-2023 11:23:25','',NULL,NULL);
INSERT INTO "associations" VALUES (7,'Chorale TOHLA','TOHLA','17-01-2023 11:25:30','',NULL,NULL);
INSERT INTO "associations" VALUES (8,'Chorale Emmanuel','EMM','17-01-2023 11:26:15','',NULL,NULL);
INSERT INTO "associations" VALUES (9,'Chorale Foi Vie','FV','17-01-2023 11:26:50','',NULL,NULL);
INSERT INTO "associations" VALUES (10,'EC','EC','17-01-2023 11:27:05','',NULL,NULL);
INSERT INTO "associations" VALUES (11,'NNT','NNT','17-01-2023 11:27:20','',NULL,NULL);
INSERT INTO "associations" VALUES (12,'Groupe des Elèvs et Etudiants','BAUDU','17-01-2023 11:35:32','',NULL,NULL);
COMMIT;


INSERT INTO "paroisiens" VALUES (9,3,'00010-B-82','','MBOG BITANGA, N. NJIP','Irène','diacre','1982-06-18','','Feminin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,4,'00011-B-82','','MBOUA III','Simon Pierre','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);

INSERT INTO "paroisiens" VALUES (9,3,'00012-B-82','','MISS','Emmanuel','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00013-B-82','','NDJÔCK','Etienne','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00014-B-82','','NGO OUM','Rhodes Lucie','diacre','1982-06-18','','Feminin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00015-B-82','','NGUIMBOUS','Jean Calvi','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00016-B-82','','NJENG II','Simon Pierre','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00017-B-82','','NYOBE MINYEM','David','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00018-B-82','','TONYE TONYE','Jules Silas E','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);
INSERT INTO "paroisiens" VALUES (9,3,'00019-B-82','','YAMB ABRAHAM','Roger','diacre','1982-06-18','','Masculin','622222222',NULL,'','Douala','2013','actif','20-01-23 07:50:57','',NULL,NULL);