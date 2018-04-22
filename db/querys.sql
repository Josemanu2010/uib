-- -----------------------------------------------------
-- Personas con el tipo
-- -----------------------------------------------------
SELECT p.name,
       p.lastname,
       t.type_name
FROM people p
INNER JOIN people_type t on t.type_id = p.people_type;
-- -----------------------------------------------------
-- Personas con cantidad de skills
-- -----------------------------------------------------
SELECT p.person_name,
       p.person_lastname,
       count(s.skill_id) as skills
FROM people p 
INNER JOIN skills_people s on s.person_id = p.person_id 
GROUP BY p.person_id;
-- -----------------------------------------------------
-- Todas las personas con todos los campos
-- -----------------------------------------------------
SELECT *
FROM people;