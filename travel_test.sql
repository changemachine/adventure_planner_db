--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: activities; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
--

CREATE TABLE activities (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE activities OWNER TO "Guest";

--
-- Name: activities_adventures; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
--

CREATE TABLE activities_adventures (
    id integer NOT NULL,
    activity_id integer,
    adventure_id integer
);


ALTER TABLE activities_adventures OWNER TO "Guest";

--
-- Name: activities_adventures_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE activities_adventures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE activities_adventures_id_seq OWNER TO "Guest";

--
-- Name: activities_adventures_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE activities_adventures_id_seq OWNED BY activities_adventures.id;


--
-- Name: activities_countries; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
--

CREATE TABLE activities_countries (
    id integer NOT NULL,
    activity_id integer,
    country_id integer
);


ALTER TABLE activities_countries OWNER TO "Guest";

--
-- Name: activities_countries_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE activities_countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE activities_countries_id_seq OWNER TO "Guest";

--
-- Name: activities_countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE activities_countries_id_seq OWNED BY activities_countries.id;


--
-- Name: activities_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE activities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE activities_id_seq OWNER TO "Guest";

--
-- Name: activities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE activities_id_seq OWNED BY activities.id;


--
-- Name: adventures; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
--

CREATE TABLE adventures (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE adventures OWNER TO "Guest";

--
-- Name: adventures_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE adventures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE adventures_id_seq OWNER TO "Guest";

--
-- Name: adventures_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE adventures_id_seq OWNED BY adventures.id;


--
-- Name: countries; Type: TABLE; Schema: public; Owner: Guest; Tablespace:
--

CREATE TABLE countries (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE countries OWNER TO "Guest";

--
-- Name: countries_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE countries_id_seq OWNER TO "Guest";

--
-- Name: countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE countries_id_seq OWNED BY countries.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY activities ALTER COLUMN id SET DEFAULT nextval('activities_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY activities_adventures ALTER COLUMN id SET DEFAULT nextval('activities_adventures_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY activities_countries ALTER COLUMN id SET DEFAULT nextval('activities_countries_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY adventures ALTER COLUMN id SET DEFAULT nextval('adventures_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY countries ALTER COLUMN id SET DEFAULT nextval('countries_id_seq'::regclass);


--
-- Data for Name: activities; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities (id, name) FROM stdin;
\.


--
-- Data for Name: activities_adventures; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities_adventures (id, activity_id, adventure_id) FROM stdin;
\.


--
-- Name: activities_adventures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_adventures_id_seq', 1, false);


--
-- Data for Name: activities_countries; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities_countries (id, activity_id, country_id) FROM stdin;
\.


--
-- Name: activities_countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_countries_id_seq', 1, false);


--
-- Name: activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_id_seq', 44, true);


--
-- Data for Name: adventures; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY adventures (id, name) FROM stdin;
\.


--
-- Name: adventures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('adventures_id_seq', 1, false);


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY countries (id, name) FROM stdin;
\.


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('countries_id_seq', 1, false);


--
-- Name: activities_adventures_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
--

ALTER TABLE ONLY activities_adventures
    ADD CONSTRAINT activities_adventures_pkey PRIMARY KEY (id);


--
-- Name: activities_countries_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
--

ALTER TABLE ONLY activities_countries
    ADD CONSTRAINT activities_countries_pkey PRIMARY KEY (id);


--
-- Name: activities_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
--

ALTER TABLE ONLY activities
    ADD CONSTRAINT activities_pkey PRIMARY KEY (id);


--
-- Name: adventures_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
--

ALTER TABLE ONLY adventures
    ADD CONSTRAINT adventures_pkey PRIMARY KEY (id);


--
-- Name: countries_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace:
--

ALTER TABLE ONLY countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus;
GRANT ALL ON SCHEMA public TO epicodus;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--
