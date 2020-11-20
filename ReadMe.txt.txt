---Create Table animals---

CREATE  TABLE `cr11_bodenwinkler_petadoption`.`animals` (
`id`  INT(11) NOT NULL AUTO_INCREMENT,
`animalName` VARCHAR(255) NOT NULL ,
`animalImage` VARCHAR(255) NOT  NULL,
`animalDescription` VARCHAR(255) NOT  NULL,
`animalLocation` VARCHAR(255) NOT  NULL,
`animalHobbies` VARCHAR(255) NOT  NULL,
`animalAge` INT NOT  NULL,
`active` int(1 ) NOT NULL DEFAULT '0' ,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ENUM animalSize für: small large senior

INSERT INTO animals (animalName, animalImage, animalDescription, animalLocation, animalHobbies, animalAge, animalSize) VALUES ('Horst', 'https://images.unsplash.com/photo-1571391733814-15ac29ac3544?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80', 'Horst die Schlange', 'Vienna - Neubau', 'Eating Rats',15, 'small');