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
    name character varying,
    feedback_id integer
);


ALTER TABLE activities OWNER TO "Guest";

--
-- Name: activities_adventures; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE activities_adventures (
    id integer NOT NULL,
    activity_id integer,
    adventure_id integer,
    required boolean
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
    name character varying,
    description character varying,
    feedback_id integer
);


ALTER TABLE adventures OWNER TO "Guest";

--
-- Name: adventures_countries; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE adventures_countries (
    id integer NOT NULL,
    adventure_id integer,
    country_id integer
);


ALTER TABLE adventures_countries OWNER TO "Guest";

--
-- Name: adventures_countries_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE adventures_countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE adventures_countries_id_seq OWNER TO "Guest";

--
-- Name: adventures_countries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE adventures_countries_id_seq OWNED BY adventures_countries.id;


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
-- Name: customers; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE customers (
    id integer NOT NULL,
    name character varying,
    password character varying
);


ALTER TABLE customers OWNER TO "Guest";

--
-- Name: customers_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE customers_id_seq OWNER TO "Guest";

--
-- Name: customers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE customers_id_seq OWNED BY customers.id;


--
-- Name: feedback; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE feedback (
    id integer NOT NULL,
    text character varying,
    user_id integer,
    activity_feedback boolean,
    adventure_feedback boolean
);


ALTER TABLE feedback OWNER TO "Guest";

--
-- Name: feedback_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE feedback_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE feedback_id_seq OWNER TO "Guest";

--
-- Name: feedback_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE feedback_id_seq OWNED BY feedback.id;


--
-- Name: levels; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE levels (
    id integer NOT NULL,
    hike_level integer,
    run_level integer,
    culture_level integer,
    eat_level integer,
    swim_level integer,
    sail_level integer,
    camp_level integer,
    adventure_id integer
);


ALTER TABLE levels OWNER TO "Guest";

--
-- Name: levels_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE levels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE levels_id_seq OWNER TO "Guest";

--
-- Name: levels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE levels_id_seq OWNED BY levels.id;


--
-- Name: locations; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE locations (
    id integer NOT NULL,
    latitude numeric,
    longitude numeric,
    activity_id integer,
    cost integer
);


ALTER TABLE locations OWNER TO "Guest";

--
-- Name: locations_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE locations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE locations_id_seq OWNER TO "Guest";

--
-- Name: locations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE locations_id_seq OWNED BY locations.id;


--
-- Name: preferences; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE preferences (
    id integer NOT NULL,
    user_id integer,
    hike_pref integer,
    run_pref integer,
    culture_pref integer,
    eat_pref integer,
    swim_pref integer,
    sail_pref integer,
    camp_pref integer
);


ALTER TABLE preferences OWNER TO "Guest";

--
-- Name: preferences_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE preferences_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE preferences_id_seq OWNER TO "Guest";

--
-- Name: preferences_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE preferences_id_seq OWNED BY preferences.id;


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

ALTER TABLE ONLY adventures_countries ALTER COLUMN id SET DEFAULT nextval('adventures_countries_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY countries ALTER COLUMN id SET DEFAULT nextval('countries_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY customers ALTER COLUMN id SET DEFAULT nextval('customers_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY feedback ALTER COLUMN id SET DEFAULT nextval('feedback_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY levels ALTER COLUMN id SET DEFAULT nextval('levels_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY locations ALTER COLUMN id SET DEFAULT nextval('locations_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY preferences ALTER COLUMN id SET DEFAULT nextval('preferences_id_seq'::regclass);


--
-- Data for Name: activities; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities (id, name, feedback_id) FROM stdin;
801	asfasdf	\N
802	asfasdf	\N
\.


--
-- Data for Name: activities_adventures; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities_adventures (id, activity_id, adventure_id, required) FROM stdin;
1	330	115	\N
2	332	116	\N
3	333	116	\N
4	335	117	\N
5	339	119	\N
7	351	125	\N
8	353	126	\N
9	354	126	\N
10	356	127	\N
11	360	129	\N
13	372	135	\N
14	374	136	\N
15	375	136	\N
16	377	137	\N
17	381	139	\N
19	393	145	\N
20	395	146	\N
21	396	146	\N
22	398	147	\N
23	402	149	\N
25	414	155	\N
26	416	156	\N
27	417	156	\N
28	419	157	\N
29	423	159	\N
31	435	165	\N
32	437	166	\N
33	438	166	\N
34	440	167	\N
35	444	169	\N
37	456	175	\N
38	458	176	\N
39	459	176	\N
40	461	177	\N
41	462	177	\N
42	465	179	\N
44	477	185	\N
45	479	186	\N
46	480	186	\N
47	482	187	\N
48	483	187	\N
49	486	189	\N
51	498	195	\N
52	500	196	\N
53	501	196	\N
54	503	197	\N
55	504	197	\N
56	507	199	\N
58	519	205	\N
59	521	207	\N
60	521	206	\N
61	523	208	\N
62	524	208	\N
63	527	210	\N
65	539	216	\N
66	541	218	\N
67	541	217	\N
68	543	219	\N
69	544	219	\N
70	547	221	\N
72	559	227	\N
73	561	229	\N
74	561	228	\N
75	563	230	\N
76	564	230	\N
77	567	232	\N
79	579	238	\N
80	581	240	\N
81	581	239	\N
82	583	241	\N
83	584	241	\N
84	587	243	\N
86	599	249	\N
87	601	251	\N
88	601	250	\N
89	603	252	\N
90	604	252	\N
91	607	254	\N
93	609	265	\N
94	610	266	\N
95	611	266	\N
97	613	269	\N
98	624	271	\N
99	626	273	\N
100	626	272	\N
101	628	274	\N
102	629	274	\N
103	632	276	\N
105	634	287	\N
106	635	288	\N
107	636	288	\N
109	638	291	\N
110	660	293	\N
111	662	295	\N
112	662	294	\N
113	664	296	\N
114	665	296	\N
115	668	298	\N
117	670	309	\N
118	671	310	\N
119	672	310	\N
121	674	313	\N
122	685	315	\N
123	687	317	\N
124	687	316	\N
125	689	318	\N
126	690	318	\N
127	693	320	\N
129	695	331	\N
130	696	332	\N
131	697	332	\N
133	699	335	\N
134	710	337	\N
135	712	339	\N
136	712	338	\N
137	714	340	\N
138	715	340	\N
139	718	342	\N
141	720	353	\N
142	721	354	\N
143	722	354	\N
145	724	357	\N
146	735	359	\N
147	737	361	\N
148	737	360	\N
149	739	362	\N
150	740	362	\N
151	743	364	\N
153	745	375	\N
154	746	376	\N
155	747	376	\N
157	749	379	\N
158	760	381	\N
159	762	383	\N
160	762	382	\N
161	764	384	\N
162	765	384	\N
163	768	386	\N
165	770	397	\N
166	771	398	\N
167	772	398	\N
169	774	401	\N
170	785	403	\N
171	787	405	\N
172	787	404	\N
173	789	406	\N
174	790	406	\N
175	793	408	\N
177	795	419	\N
178	796	420	\N
179	797	420	\N
181	799	423	\N
\.


--
-- Name: activities_adventures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_adventures_id_seq', 181, true);


--
-- Data for Name: activities_countries; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY activities_countries (id, activity_id, country_id) FROM stdin;
1	310	41
2	313	43
3	313	42
4	316	44
5	319	46
7	331	47
8	334	49
9	334	48
10	337	50
11	340	52
13	352	53
14	355	55
15	355	54
16	358	56
17	361	58
19	373	59
20	376	61
21	376	60
22	379	62
23	382	64
25	394	65
26	397	67
27	397	66
28	400	68
29	403	70
31	415	71
32	418	73
33	418	72
34	421	74
35	424	76
37	436	77
38	439	79
39	439	78
40	442	80
41	443	80
42	445	82
44	457	83
45	460	85
46	460	84
47	463	86
48	464	86
49	466	88
51	478	89
52	481	91
53	481	90
54	484	92
55	485	92
56	487	94
58	499	95
59	502	97
60	502	96
61	505	98
62	506	98
63	508	100
65	520	101
66	522	103
67	522	102
68	525	104
69	526	104
70	528	106
72	540	107
73	542	109
74	542	108
75	545	110
76	546	110
77	548	112
79	560	113
80	562	115
81	562	114
82	565	116
83	566	116
84	568	118
86	580	119
87	582	121
88	582	120
89	585	122
90	586	122
91	588	124
93	600	125
94	602	127
95	602	126
96	605	128
97	606	128
98	608	130
100	625	136
101	627	138
102	627	137
103	630	139
104	631	139
105	633	141
107	661	155
108	663	157
109	663	156
110	666	158
111	667	158
112	669	160
114	686	166
115	688	168
116	688	167
117	691	169
118	692	169
119	694	171
121	711	177
122	713	179
123	713	178
124	716	180
125	717	180
126	719	182
128	736	188
129	738	190
130	738	189
131	741	191
132	742	191
133	744	193
135	761	199
136	763	201
137	763	200
138	766	202
139	767	202
140	769	204
142	786	210
143	788	212
144	788	211
145	791	213
146	792	213
147	794	215
\.


--
-- Name: activities_countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_countries_id_seq', 148, true);


--
-- Name: activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('activities_id_seq', 802, true);


--
-- Data for Name: adventures; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY adventures (id, name, description, feedback_id) FROM stdin;
\.


--
-- Data for Name: adventures_countries; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY adventures_countries (id, adventure_id, country_id) FROM stdin;
1	267	131
2	268	132
3	268	133
5	270	135
6	289	142
7	290	143
8	290	144
10	292	146
11	311	161
12	312	162
13	312	163
15	314	165
16	333	172
17	334	173
18	334	174
20	336	176
21	355	183
22	356	184
23	356	185
25	358	187
26	377	194
27	378	195
28	378	196
30	380	198
31	399	205
32	400	206
33	400	207
35	402	209
36	421	216
37	422	217
38	422	218
40	424	220
\.


--
-- Name: adventures_countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('adventures_countries_id_seq', 40, true);


--
-- Name: adventures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('adventures_id_seq', 424, true);


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY countries (id, name) FROM stdin;
221	Bam
222	ZANZIBAR
223	Bam
\.


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('countries_id_seq', 223, true);


--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY customers (id, name, password) FROM stdin;
\.


--
-- Name: customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('customers_id_seq', 8, true);


--
-- Data for Name: feedback; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY feedback (id, text, user_id, activity_feedback, adventure_feedback) FROM stdin;
\.


--
-- Name: feedback_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('feedback_id_seq', 1, false);


--
-- Data for Name: levels; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY levels (id, hike_level, run_level, culture_level, eat_level, swim_level, sail_level, camp_level, adventure_id) FROM stdin;
\.


--
-- Name: levels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('levels_id_seq', 1, false);


--
-- Data for Name: locations; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY locations (id, latitude, longitude, activity_id, cost) FROM stdin;
\.


--
-- Name: locations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('locations_id_seq', 120, true);


--
-- Data for Name: preferences; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY preferences (id, user_id, hike_pref, run_pref, culture_pref, eat_pref, swim_pref, sail_pref, camp_pref) FROM stdin;
\.


--
-- Name: preferences_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('preferences_id_seq', 1, false);


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
-- Name: adventures_countries_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY adventures_countries
    ADD CONSTRAINT adventures_countries_pkey PRIMARY KEY (id);


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
-- Name: customers_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);


--
-- Name: feedback_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY feedback
    ADD CONSTRAINT feedback_pkey PRIMARY KEY (id);


--
-- Name: levels_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY levels
    ADD CONSTRAINT levels_pkey PRIMARY KEY (id);


--
-- Name: locations_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY locations
    ADD CONSTRAINT locations_pkey PRIMARY KEY (id);


--
-- Name: preferences_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY preferences
    ADD CONSTRAINT preferences_pkey PRIMARY KEY (id);


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

