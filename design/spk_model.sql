CREATE TABLE "criteria" (
"crt_id" int2 NOT NULL DEFAULT nextval('criteria_crt_id_seq'::regclass),
"crt_code" varchar(25) COLLATE "default" NOT NULL,
"crt_name" varchar(100) COLLATE "default" NOT NULL,
"crt_parent_id" int2 NOT NULL DEFAULT nextval('criteria_crt_parent_id_seq'::regclass),
"crt_range_type_id" int2 NOT NULL,
CONSTRAINT "criteria_pkey" PRIMARY KEY ("crt_id") 
)
WITHOUT OIDS;

ALTER TABLE "criteria" OWNER TO "postgres";

CREATE TABLE "criteria_fuzzy" (
"crf_id" int2 NOT NULL DEFAULT nextval('criteria_fuzzy_crf_id_seq'::regclass),
"crf_criteria_id" int2 NOT NULL DEFAULT nextval('criteria_fuzzy_crf_criteria_id_seq'::regclass),
"crf_container" text COLLATE "default" NOT NULL,
"crf_index" varchar(100),
CONSTRAINT "criteria_fuzzy_pkey" PRIMARY KEY ("crf_id") 
)
WITHOUT OIDS;

ALTER TABLE "criteria_fuzzy" OWNER TO "postgres";

CREATE TABLE "criteria_range_type" (
"rgt_id" int2 NOT NULL DEFAULT nextval('criteria_range_type_rgt_id_seq'::regclass),
"rgt_name" varchar(50) COLLATE "default",
CONSTRAINT "criteria_range_type_pkey" PRIMARY KEY ("rgt_id") 
)
WITHOUT OIDS;

ALTER TABLE "criteria_range_type" OWNER TO "postgres";

CREATE TABLE "dss_criteria" (
"dsc_id" int4 NOT NULL DEFAULT nextval('dss_criteria_dsd_id_seq'::regclass),
"dsc_master_id" int2 NOT NULL,
"dsc_criteria_id" int2 NOT NULL DEFAULT nextval('dss_criteria_dsd_criteria_id_seq'::regclass),
"dsc_weight" float8 DEFAULT 0,
CONSTRAINT "dss_criteria_pkey" PRIMARY KEY ("dsc_id") 
)
WITHOUT OIDS;

ALTER TABLE "dss_criteria" OWNER TO "postgres";

CREATE TABLE "dss_master" (
"dsm_id" int2 NOT NULL DEFAULT nextval('dss_master_dsm_id_seq'::regclass),
"dsm_name" varchar(100) COLLATE "default" NOT NULL,
"dsm_start_period" date,
"dsm_end_period" date,
"dsm_max_selection" int2 DEFAULT 10,
"dsm_is_template" char(1) COLLATE "default" DEFAULT 'n'::bpchar,
CONSTRAINT "dss_master_pkey" PRIMARY KEY ("dsm_id") 
)
WITHOUT OIDS;

ALTER TABLE "dss_master" OWNER TO "postgres";

CREATE TABLE "dss_result_detail" (
"drd_id" int4 NOT NULL DEFAULT nextval('dss_result_detail_drd_id_seq'::regclass),
"drd_result_id" int4 NOT NULL,
"drd_criteria_id" int2 NOT NULL,
"drd_weight" float8 NOT NULL DEFAULT 0,
CONSTRAINT "dss_result_detail_pkey" PRIMARY KEY ("drd_id") 
)
WITHOUT OIDS;

ALTER TABLE "dss_result_detail" OWNER TO "postgres";

CREATE TABLE "dss_result" (
"dsr_id" int4 NOT NULL DEFAULT nextval('dss_participant_pcp_id_seq'::regclass),
"dsr_dss_id" int2 NOT NULL,
"dsr_society_id" int4 NOT NULL,
"dsr_participant_data" text COLLATE "default",
"dsr_relevance" float4,
CONSTRAINT "dss_participant_pkey" PRIMARY KEY ("dsr_id") 
)
WITHOUT OIDS;

ALTER TABLE "dss_result" OWNER TO "postgres";

CREATE TABLE "participant_data" (
"pad_id" int4 NOT NULL DEFAULT nextval('dss_participant_data_pad_id_seq'::regclass),
"pad_participant_id" int4 NOT NULL DEFAULT nextval('dss_participant_data_pad_participant_id_seq'::regclass),
"pad_field_id" int4 NOT NULL DEFAULT nextval('dss_participant_data_pad_field_id_seq'::regclass),
"pad_field_value" text COLLATE "default",
CONSTRAINT "dss_participant_data_pkey" PRIMARY KEY ("pad_id") 
)
WITHOUT OIDS;

ALTER TABLE "participant_data" OWNER TO "postgres";

CREATE TABLE "participant_field" (
"pdf_id" int4 NOT NULL DEFAULT nextval('participant_field_pdf_id_seq'::regclass),
"pdf_name" varchar(100) COLLATE "default" NOT NULL,
"pdf_criteria_id" int2 NOT NULL,
CONSTRAINT "participant_field_pkey" PRIMARY KEY ("pdf_id") 
)
WITHOUT OIDS;

ALTER TABLE "participant_field" OWNER TO "postgres";

CREATE TABLE "role" (
"usr_id" int2 NOT NULL DEFAULT nextval('user_role_usr_id_seq'::regclass),
"usr_code" varchar(100) COLLATE "default" NOT NULL,
"usr_name" varchar(255) COLLATE "default" NOT NULL,
CONSTRAINT "user_role_pkey" PRIMARY KEY ("usr_id") 
)
WITHOUT OIDS;

ALTER TABLE "role" OWNER TO "postgres";

CREATE TABLE "society" (
"sct_id" int4 NOT NULL DEFAULT nextval('society_sct_id_seq'::regclass),
"sct_name" varchar(100) COLLATE "default" NOT NULL,
"sct_address" varchar(255) COLLATE "default",
CONSTRAINT "society_pkey" PRIMARY KEY ("sct_id") 
)
WITHOUT OIDS;

ALTER TABLE "society" OWNER TO "postgres";

CREATE TABLE "user" (
"uac_id" int2 NOT NULL DEFAULT nextval('base_user_uac_id_seq'::regclass),
"uac_username" varchar(100) COLLATE "default" NOT NULL,
"uac_password" varchar(128) COLLATE "default" NOT NULL,
CONSTRAINT "base_user_pkey" PRIMARY KEY ("uac_id") 
)
WITHOUT OIDS;

ALTER TABLE "user" OWNER TO "postgres";

CREATE TABLE "user_role" (
"uar_id" int2 NOT NULL DEFAULT nextval('user_role_uar_id_seq'::regclass),
"uar_role_id" int2 NOT NULL DEFAULT nextval('user_role_uar_role_id_seq'::regclass),
"uar_account_id" int2 NOT NULL DEFAULT nextval('user_role_uar_account_id_seq'::regclass),
CONSTRAINT "user_role_pkey1" PRIMARY KEY ("uar_id") 
)
WITHOUT OIDS;

ALTER TABLE "user_role" OWNER TO "postgres";


ALTER TABLE "criteria" ADD CONSTRAINT "criteria_crt_parent_id_fkey" FOREIGN KEY ("crt_parent_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "criteria_fuzzy" ADD CONSTRAINT "criteria_fuzzy_crf_criteria_id_fkey" FOREIGN KEY ("crf_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "dss_criteria" ADD CONSTRAINT "dss_criteria_dsc_master_id_fkey" FOREIGN KEY ("dsc_master_id") REFERENCES "dss_master" ("dsm_id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "dss_criteria" ADD CONSTRAINT "dss_criteria_dsc_criteria_id_fkey" FOREIGN KEY ("dsc_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "dss_result_detail" ADD CONSTRAINT "dss_result_detail_drd_criteria_id_fkey" FOREIGN KEY ("drd_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "dss_result" ADD CONSTRAINT "participant_pcp_dss_id_fkey" FOREIGN KEY ("dsr_dss_id") REFERENCES "dss_master" ("dsm_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "dss_result" ADD CONSTRAINT "participant_pcp_society_id_fkey" FOREIGN KEY ("dsr_society_id") REFERENCES "society" ("sct_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "participant_data" ADD CONSTRAINT "participant_data_pad_participant_id_fkey" FOREIGN KEY ("pad_participant_id") REFERENCES "dss_result" ("dsr_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "participant_data" ADD CONSTRAINT "participant_data_pad_field_id_fkey" FOREIGN KEY ("pad_field_id") REFERENCES "participant_field" ("pdf_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "participant_field" ADD CONSTRAINT "participant_field_pdf_criteria_id_fkey" FOREIGN KEY ("pdf_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "user_role" ADD CONSTRAINT "user_role_uar_account_id_fkey" FOREIGN KEY ("uar_account_id") REFERENCES "user" ("uac_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "user_role" ADD CONSTRAINT "user_role_uar_role_id_fkey" FOREIGN KEY ("uar_role_id") REFERENCES "role" ("usr_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "criteria" ADD FOREIGN KEY ("crt_range_type_id") REFERENCES "criteria_range_type" ("rgt_id") ON DELETE RESTRICT;
ALTER TABLE "dss_result_detail" ADD FOREIGN KEY ("drd_result_id") REFERENCES "dss_result" ("dsr_id") ON DELETE CASCADE;

