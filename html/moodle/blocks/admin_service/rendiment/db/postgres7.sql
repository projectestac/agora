# This file contains a complete database schema for all the 
# tables used by this module, written in SQL

# It may also contain INSERT statements for particular data 
# that may be used, especially new entries in the table log_display

CREATE TABLE prefix_indicadors (
  id bigserial NOT NULL,
  course numeric(10) NOT NULL CHECK (course >=0)DEFAULT 0,
  name VARCHAR(255) NOT NULL DEFAULT '',
  timemodified numeric(10) NOT NULL CHECK (timemodified >=0) DEFAULT 0,
  CONSTRAINT indicadors_pkey PRIMARY KEY (id),
  CONSTRAINT indicadors_keyuniq UNIQUE (id));

CREATE TABLE prefix_indicadors_cron (
  id bigserial NOT NULL,
  number_rows numeric(10) NOT NULL CHECK (number_rows >=0)DEFAULT 0,
  number_backends numeric(10) NOT NULL CHECK (number_rows >=0)DEFAULT 0,
  time numeric(10) NOT NULL CHECK (time >=0) DEFAULT 0,
  time_start numeric(10) NOT NULL CHECK (time >=0) DEFAULT 0,
  CONSTRAINT indicadors_cron_pkey PRIMARY KEY (id));

#INSERT de la instancia SINGLETON pels administradors.

#INSERT INTO prefix_indicadors VALUES ('1','0','0');
