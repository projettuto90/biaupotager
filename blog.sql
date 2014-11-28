	DROP TABLE IF EXISTS COMMENTAIRES;
	DROP TABLE IF EXISTS ARTICLES;
	DROP TABLE IF EXISTS membres;
	DROP TABLE IF EXISTS themes;

	CREATE TABLE THEMES (
	    id_theme INT AUTO_INCREMENT PRIMARY KEY,
	    libelle  VARCHAR(50)
	)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

	INSERT INTO THEMES (libelle) VALUES ('informatique');
	INSERT INTO THEMES (libelle) VALUES ('economie');
	INSERT INTO THEMES (libelle) VALUES ('sport');
	INSERT INTO THEMES (libelle) VALUES ('cinema');

	CREATE TABLE IF NOT EXISTS `membres` (
	  `id_membre` int(2) NOT NULL AUTO_INCREMENT,
	  `login` varchar(100) NOT NULL,
	  `email` varchar(100) NOT NULL,
	  `pass` varchar(255) NOT NULL,
	  `droit` tinyint(4) NOT NULL,
	  `valide` tinyint(4) NOT NULL,
	  PRIMARY KEY (`id_membre`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

	INSERT INTO `membres` (`id_membre`, `login`, `email`, `pass`, `droit`, `valide`) VALUES
	(1, 'toto', 'toto@gmail.com', 'toto', 1, 1),
	(2, 'toto2', 'toto2@gmail.com', 'toto', 1, 0),
	(3, 'admin', 'admin@site.fr', 'admin', 2, 1);

	CREATE TABLE ARTICLES (
	    id_article INT UNSIGNED AUTO_INCREMENT NOT NULL,
	    id_theme int NOT NULL,
	    id_membre int(2) NOT NULL,
	    titre  VARCHAR(50),
	    contenu TEXT,
	    date_creation DATETIME DEFAULT NULL,
	    date_modification DATETIME DEFAULT NULL, # date et heure de la derniere modification du article.
		
		CONSTRAINT FK_3 FOREIGN KEY (id_theme) REFERENCES THEMES (id_theme),
		CONSTRAINT FK_4 FOREIGN KEY (id_membre) REFERENCES membres (id_membre),
	    PRIMARY KEY(id_article)
	)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

	INSERT INTO ARTICLES (id_theme,id_membre,titre,contenu,date_creation,date_modification)
	    VALUES (1,1,'enseignement de l informatique', 'http://www.lemonde.fr/idees/article/2012/06/22/l-informatique-est-une-science-bien-trop-serieuse-pour-etre-laissee-aux-informaticiens_1722939_3232.html', NOW(), NOW());
	INSERT INTO ARTICLES (id_theme,id_membre,titre,contenu,date_creation,date_modification)
	    VALUES (1,1,'enseignement de l informatique', 'http://www.lemonde.fr/idees/article/2012/06/22/l-informatique-est-une-science-bien-trop-serieuse-pour-etre-laissee-aux-informaticiens_1722939_3232.html', NOW(), NOW());

	CREATE TABLE COMMENTAIRES (

	    id_commentaire INT UNSIGNED AUTO_INCREMENT,  # : identifiant du commentaire, cle primaire et auto_increment ;
	    id_article int UNSIGNED NOT NULL,         # : identifiant du article auquel correspond ce commentaire ;
	    auteur varchar (255),  # : auteur du commentaire ;
	    commentaire TEXT,   # : contenu du commentaire ;
	    date_commentaire  DATETIME DEFAULT NULL,   # : date et heure auxquelles le commentaire a ete poste.
		CONSTRAINT FK_5 FOREIGN KEY (id_article) REFERENCES ARTICLES (id_article),
	    PRIMARY KEY (id_commentaire)
	)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

