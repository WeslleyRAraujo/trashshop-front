-- create log table
CREATE TABLE log(
    id SERIAL NOT NULL PRIMARY KEY,
    message TEXT NOT NULL,
    datelog TIMESTAMP NOT NULL
);