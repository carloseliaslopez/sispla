DROP DATABASE GLOBAL_RISK_LISTS;
CREATE DATABASE GLOBAL_RISK_LISTS;
USE GLOBAL_RISK_LISTS;

DROP TABLE IF EXISTS OFAC_LIST_EN;
CREATE TABLE OFAC_LIST_EN(
idOFAC_LIST_EN int auto_increment not null primary key,
fullName_E varchar(250),
sdnType_E varchar(25),
program_E varchar(100),
city_E varchar(100),
country_E varchar(100),
origen varchar(50),
FULLTEXT(fullName_E)
);

DROP TABLE IF EXISTS OFAC_LIST_IN;
CREATE TABLE OFAC_LIST_IN(
idOFAC_LIST_IN int auto_increment not null primary key,
fullName_I varchar(250),
sdnType_I varchar(25),
program_I  varchar(25),
idType_I varchar(100),
idNumber_I varchar(100),
country_I varchar(100),
dateOfBirth_I varchar(100),
origen varchar(50),
FULLTEXT(fullName_I)
);

DROP TABLE IF EXISTS ONU_LIST_EN;
CREATE TABLE ONU_LIST_EN(
idONU_LIST_EN int auto_increment not null primary key,
fullName_E varchar(250) ,
sdnType_E varchar(25),
program_E varchar(100),
listed_on_E varchar(100),
country_E varchar(100),
origen varchar(50),
FULLTEXT(fullName_E)
);

DROP TABLE IF EXISTS ONU_LIST_IN;
CREATE TABLE ONU_LIST_IN(
idONU_LIST_IN int auto_increment not null primary key,
fullName_I varchar(250),
sdnType_I varchar(25),
program_I varchar(100),
listed_on_I varchar(100),
value_I varchar(100),
year_I varchar(100),
type_of_document_I varchar(100),
number_I varchar(100),
origen varchar(50),
FULLTEXT(fullName_I)
);

SELECT * FROM ONU_LIST_IN WHERE MATCH(fullName_I) AGAINST('wicked');



