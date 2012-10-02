
CREATE TABLE prefix_slideshow (
  id SERIAL PRIMARY KEY,
  course integer NOT NULL default '0',
  name varchar(255) default NULL,
  location text,
  layout integer NOT NULL default '0',
  filename integer NOT NULL default '0',
  delaytime integer NOT NULL default '7',
  centred integer NOT NULL default '0',
  autobgcolor integer NOT NULL default '0',
  htmlcaptions integer NOT NULL default '1',
  timemodified integer NOT NULL default '0'
);
CREATE TABLE prefix_slideshow_captions (
  id SERIAL PRIMARY KEY,
  slideshow integer NOT NULL default '0',
  image text NOT NULL,
  title text NOT NULL,
  caption text NOT NULL
);