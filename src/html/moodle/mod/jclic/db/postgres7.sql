# This file contains a complete database schema for all the 
# tables used by jclic module, written in SQL


#
# Table structure for `jclic`
#

CREATE TABLE prefix_jclic (
    id           SERIAL PRIMARY KEY,
    course       INT4 NOT NULL default '0',
    name         VARCHAR(255) NOT NULL default '',
    description  TEXT,
    url          VARCHAR(100) NOT NULL default '',
    skin         VARCHAR(20) NOT NULL default '',
    maxattempts  INT2 default '0',
    width        INT2 default '600',
    height       INT2 default '400',
    avaluation   VARCHAR(10) default NULL,
    maxgrade     VARCHAR(15) default NULL
);
COMMENT ON TABLE prefix_jclic IS 'Main information about each jclic activity';
CREATE INDEX prefix_jclic_course ON prefix_jclic (course);
#  PRIMARY KEY  (`id`),
#  KEY `course` (`course`)

# --------------------------------------------------------

#
# Table structure for `jclic_sessions`
#

CREATE TABLE prefix_jclic_sessions (
    id               SERIAL PRIMARY KEY,
    jclicid          INT2 NOT NULL default '0',
    session_id       VARCHAR(50) NOT NULL default '',
    user_id          VARCHAR(50) NOT NULL default '',
    session_datetime TIMESTAMP NOT NULL,
    project_name     VARCHAR(100) NOT NULL default '',
    session_key      VARCHAR(50) default NULL,
    session_code     VARCHAR(50) default NULL,
    session_context  VARCHAR(50) default NULL
);
COMMENT ON TABLE prefix_jclic_sessions IS 'Main information about each jclic session';
CREATE INDEX prefix_jclic_sessions_user_id ON prefix_jclic_sessions (user_id);
CREATE INDEX prefix_jclic_sessions_jclicid ON prefix_jclic_sessions (jclicid);
CREATE UNIQUE INDEX prefix_jclic_sessions_session_id_uk ON prefix_jclic_sessions (session_id);

#
# Table structure for `jclic_activities`
#

CREATE TABLE prefix_jclic_activities (
    id              SERIAL PRIMARY KEY,
    session_id      VARCHAR(50) NOT NULL default '',
    activity_id     INT2 NOT NULL default '0',
    activity_name   VARCHAR(50) NOT NULL default '',
    num_actions     INT2 default NULL,
    score           INT2 default NULL,
    activity_solved INT2 default NULL,
    qualification   INT2 default NULL,
    total_time      INT2 default NULL,
    activity_code   VARCHAR(50) default NULL
);
COMMENT ON TABLE prefix_jclic_activities IS 'Stores user information for each jclic activity';

#
# Table structure for `jclic_settings`
#

CREATE TABLE prefix_jclic_settings (
  setting_key    VARCHAR(255) NOT NULL default '',
  setting_value  VARCHAR(255) default NULL,
  PRIMARY KEY (setting_key)
);
COMMENT ON TABLE prefix_jclic_settings IS 'Stores settings information';
#  PRIMARY KEY  (`setting_key`)

-- Load data

INSERT INTO prefix_jclic_settings VALUES ('ALLOW_CREATE_GROUPS', 'false');
INSERT INTO prefix_jclic_settings VALUES ('ALLOW_CREATE_USERS', 'false');
INSERT INTO prefix_jclic_settings VALUES ('SHOW_GROUP_LIST', 'false');
INSERT INTO prefix_jclic_settings VALUES ('SHOW_USER_LIST', 'false');
INSERT INTO prefix_jclic_settings VALUES ('USER_TABLES', 'true');
INSERT INTO prefix_jclic_settings VALUES ('TIME_LAP', '10');

# --------------------------------------------------------


#
# Table structure for `jclic_groups`
#

CREATE TABLE prefix_jclic_groups (
    id                SERIAL PRIMARY KEY,
    group_id          VARCHAR(50) NOT NULL default '',
    group_name        VARCHAR(80) NOT NULL default '',
    group_description VARCHAR(255) default NULL,
    group_icon        VARCHAR(255) default NULL,
    group_code        VARCHAR(50) default NULL,
    group_keywords    VARCHAR(255) default NULL
);

-- Load data

INSERT INTO prefix_jclic_groups (group_id, group_name) VALUES ('1', 'Moodle');

# --------------------------------------------------------


#
# Table structure for `jclic_users`
#

CREATE TABLE prefix_jclic_users (
  id            SERIAL PRIMARY KEY,
  user_id       VARCHAR(50) NOT NULL default '',
  group_id      VARCHAR(50) NOT NULL default '',
  user_name     VARCHAR(80) NOT NULL default '',
  user_pwd      VARCHAR(255) default NULL,
  user_icon     VARCHAR(255) default NULL,
  user_code     VARCHAR(50) default NULL,
  user_keywords VARCHAR(255) default NULL
);

