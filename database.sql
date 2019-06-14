CREATE TABLE "owner" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(50) NOT NULL
);

CREATE TABLE "pet" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(50) NOT NULL,
    "breed" VARCHAR(50) NOT NULL,
    "color" VARCHAR(50) NOT NULL,
    "is_checked_in" DATE DEFAULT NULL,
	"owner_id" INTEGER REFERENCES "owner" ON DELETE CASCADE
);

INSERT INTO "owner" ("name")
VALUES ('Michael Jackson'), ('Elvis'), ('Salvador Dali'), ('Shaggy'), ('Dr. Claw'), ('Homer Simpson');


INSERT INTO "pet" ("name", "breed", "color", "is_checked_in", "owner_id")
VALUES ('Bubbles', 'Chimpanzee', 'Black', 'Null', '1'),
('Scatter', 'Chimpanzee', 'Black', 'Null', '2'),
('Babou', 'Ocelot', 'Tan with black stripes', 'Null', '3'),
('Scooby-Doo', 'Great Dane', 'Brown', 'Null', '4'), 
('Santas Little Helper', 'Mutt', 'Brown', 'Null', '6'),
('Snowball II', 'Domestic Short-Haired', 'Black', 'Null', '6');