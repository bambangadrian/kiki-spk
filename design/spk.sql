/*
Navicat PGSQL Data Transfer

Source Server         : Local
Source Server Version : 90602
Source Host           : localhost:5432
Source Database       : spk
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90500
File Encoding         : 65001

Date: 2017-10-28 16:13:16
*/


-- ----------------------------
-- Sequence structure for base_user_uac_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "base_user_uac_id_seq";
CREATE SEQUENCE "base_user_uac_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_crt_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_crt_id_seq";
CREATE SEQUENCE "criteria_crt_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_crt_parent_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_crt_parent_id_seq";
CREATE SEQUENCE "criteria_crt_parent_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_fuzzy_crf_criteria_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_fuzzy_crf_criteria_id_seq";
CREATE SEQUENCE "criteria_fuzzy_crf_criteria_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_fuzzy_crf_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_fuzzy_crf_id_seq";
CREATE SEQUENCE "criteria_fuzzy_crf_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_fuzzy_crf_type_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_fuzzy_crf_type_id_seq";
CREATE SEQUENCE "criteria_fuzzy_crf_type_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for criteria_range_type_rgt_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "criteria_range_type_rgt_id_seq";
CREATE SEQUENCE "criteria_range_type_rgt_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_criteria_dsd_criteria_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_criteria_dsd_criteria_id_seq";
CREATE SEQUENCE "dss_criteria_dsd_criteria_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_criteria_dsd_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_criteria_dsd_id_seq";
CREATE SEQUENCE "dss_criteria_dsd_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_master_dsm_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_master_dsm_id_seq";
CREATE SEQUENCE "dss_master_dsm_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_participant_data_pad_field_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_participant_data_pad_field_id_seq";
CREATE SEQUENCE "dss_participant_data_pad_field_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_participant_data_pad_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_participant_data_pad_id_seq";
CREATE SEQUENCE "dss_participant_data_pad_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_participant_data_pad_participant_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_participant_data_pad_participant_id_seq";
CREATE SEQUENCE "dss_participant_data_pad_participant_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_participant_pcp_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_participant_pcp_id_seq";
CREATE SEQUENCE "dss_participant_pcp_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_result_detail_drd_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_result_detail_drd_id_seq";
CREATE SEQUENCE "dss_result_detail_drd_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_result_dsr_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_result_dsr_id_seq";
CREATE SEQUENCE "dss_result_dsr_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_result_dsr_master_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_result_dsr_master_id_seq";
CREATE SEQUENCE "dss_result_dsr_master_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for dss_result_dsr_participant_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "dss_result_dsr_participant_id_seq";
CREATE SEQUENCE "dss_result_dsr_participant_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for participant_field_pdf_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "participant_field_pdf_id_seq";
CREATE SEQUENCE "participant_field_pdf_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for society_sct_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "society_sct_id_seq";
CREATE SEQUENCE "society_sct_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for user_role_uar_account_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "user_role_uar_account_id_seq";
CREATE SEQUENCE "user_role_uar_account_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for user_role_uar_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "user_role_uar_id_seq";
CREATE SEQUENCE "user_role_uar_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for user_role_uar_role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "user_role_uar_role_id_seq";
CREATE SEQUENCE "user_role_uar_role_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Sequence structure for user_role_usr_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "user_role_usr_id_seq";
CREATE SEQUENCE "user_role_usr_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 1;

-- ----------------------------
-- Table structure for criteria
-- ----------------------------
DROP TABLE IF EXISTS "criteria";
CREATE TABLE "criteria" (
"crt_id" int2 DEFAULT nextval('criteria_crt_id_seq'::regclass) NOT NULL,
"crt_code" varchar(25) COLLATE "default" NOT NULL,
"crt_name" varchar(100) COLLATE "default" NOT NULL,
"crt_parent_id" int2 DEFAULT nextval('criteria_crt_parent_id_seq'::regclass) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of criteria
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for criteria_fuzzy
-- ----------------------------
DROP TABLE IF EXISTS "criteria_fuzzy";
CREATE TABLE "criteria_fuzzy" (
"crf_id" int2 DEFAULT nextval('criteria_fuzzy_crf_id_seq'::regclass) NOT NULL,
"crf_type_id" int2 DEFAULT nextval('criteria_fuzzy_crf_type_id_seq'::regclass) NOT NULL,
"crf_criteria_id" int2 DEFAULT nextval('criteria_fuzzy_crf_criteria_id_seq'::regclass) NOT NULL,
"crf_container" text COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of criteria_fuzzy
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for criteria_range_type
-- ----------------------------
DROP TABLE IF EXISTS "criteria_range_type";
CREATE TABLE "criteria_range_type" (
"rgt_id" int2 DEFAULT nextval('criteria_range_type_rgt_id_seq'::regclass) NOT NULL,
"rgt_name" varchar(50) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of criteria_range_type
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for dss_criteria
-- ----------------------------
DROP TABLE IF EXISTS "dss_criteria";
CREATE TABLE "dss_criteria" (
"dsc_id" int4 DEFAULT nextval('dss_criteria_dsd_id_seq'::regclass) NOT NULL,
"dsc_master_id" int2 NOT NULL,
"dsc_criteria_id" int2 DEFAULT nextval('dss_criteria_dsd_criteria_id_seq'::regclass) NOT NULL,
"dsc_weight" float8 DEFAULT 0
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of dss_criteria
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for dss_master
-- ----------------------------
DROP TABLE IF EXISTS "dss_master";
CREATE TABLE "dss_master" (
"dsm_id" int2 DEFAULT nextval('dss_master_dsm_id_seq'::regclass) NOT NULL,
"dsm_name" varchar(100) COLLATE "default" NOT NULL,
"dsm_start_period" date,
"dsm_end_period" date,
"dsm_max_selection" int2 DEFAULT 10,
"dsm_is_template" char(1) COLLATE "default" DEFAULT 'n'::bpchar
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of dss_master
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for dss_result
-- ----------------------------
DROP TABLE IF EXISTS "dss_result";
CREATE TABLE "dss_result" (
"dsr_id" int4 DEFAULT nextval('dss_result_dsr_id_seq'::regclass) NOT NULL,
"dsr_master_id" int2 DEFAULT nextval('dss_result_dsr_master_id_seq'::regclass) NOT NULL,
"dsr_participant_id" int4 DEFAULT nextval('dss_result_dsr_participant_id_seq'::regclass) NOT NULL,
"dsr_relevance" float8 DEFAULT 0 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of dss_result
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for dss_result_detail
-- ----------------------------
DROP TABLE IF EXISTS "dss_result_detail";
CREATE TABLE "dss_result_detail" (
"drd_id" int4 DEFAULT nextval('dss_result_detail_drd_id_seq'::regclass) NOT NULL,
"drd_result_id" int4 NOT NULL,
"drd_criteria_id" int2 NOT NULL,
"drd_weight" float8 DEFAULT 0 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of dss_result_detail
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for participant
-- ----------------------------
DROP TABLE IF EXISTS "participant";
CREATE TABLE "participant" (
"pcp_id" int4 DEFAULT nextval('dss_participant_pcp_id_seq'::regclass) NOT NULL,
"pcp_dss_id" int2 NOT NULL,
"pcp_society_id" int4 NOT NULL,
"pcp_data" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of participant
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for participant_data
-- ----------------------------
DROP TABLE IF EXISTS "participant_data";
CREATE TABLE "participant_data" (
"pad_id" int4 DEFAULT nextval('dss_participant_data_pad_id_seq'::regclass) NOT NULL,
"pad_participant_id" int4 DEFAULT nextval('dss_participant_data_pad_participant_id_seq'::regclass) NOT NULL,
"pad_field_id" int4 DEFAULT nextval('dss_participant_data_pad_field_id_seq'::regclass) NOT NULL,
"pad_field_value" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of participant_data
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for participant_field
-- ----------------------------
DROP TABLE IF EXISTS "participant_field";
CREATE TABLE "participant_field" (
"pdf_id" int4 DEFAULT nextval('participant_field_pdf_id_seq'::regclass) NOT NULL,
"pdf_name" varchar(100) COLLATE "default" NOT NULL,
"pdf_criteria_id" int2 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of participant_field
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS "role";
CREATE TABLE "role" (
"usr_id" int2 DEFAULT nextval('user_role_usr_id_seq'::regclass) NOT NULL,
"usr_code" varchar(100) COLLATE "default" NOT NULL,
"usr_name" varchar(255) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of role
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for society
-- ----------------------------
DROP TABLE IF EXISTS "society";
CREATE TABLE "society" (
"sct_id" int4 DEFAULT nextval('society_sct_id_seq'::regclass) NOT NULL,
"sct_name" varchar(100) COLLATE "default" NOT NULL,
"sct_address" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of society
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "user";
CREATE TABLE "user" (
"uac_id" int2 DEFAULT nextval('base_user_uac_id_seq'::regclass) NOT NULL,
"uac_username" varchar(100) COLLATE "default" NOT NULL,
"uac_password" varchar(128) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS "user_role";
CREATE TABLE "user_role" (
"uar_id" int2 DEFAULT nextval('user_role_uar_id_seq'::regclass) NOT NULL,
"uar_role_id" int2 DEFAULT nextval('user_role_uar_role_id_seq'::regclass) NOT NULL,
"uar_account_id" int2 DEFAULT nextval('user_role_uar_account_id_seq'::regclass) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user_role
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "base_user_uac_id_seq" OWNED BY "user"."uac_id";
ALTER SEQUENCE "criteria_crt_id_seq" OWNED BY "criteria"."crt_id";
ALTER SEQUENCE "criteria_crt_parent_id_seq" OWNED BY "criteria"."crt_parent_id";
ALTER SEQUENCE "criteria_fuzzy_crf_criteria_id_seq" OWNED BY "criteria_fuzzy"."crf_criteria_id";
ALTER SEQUENCE "criteria_fuzzy_crf_id_seq" OWNED BY "criteria_fuzzy"."crf_id";
ALTER SEQUENCE "criteria_fuzzy_crf_type_id_seq" OWNED BY "criteria_fuzzy"."crf_type_id";
ALTER SEQUENCE "criteria_range_type_rgt_id_seq" OWNED BY "criteria_range_type"."rgt_id";
ALTER SEQUENCE "dss_criteria_dsd_criteria_id_seq" OWNED BY "dss_criteria"."dsc_criteria_id";
ALTER SEQUENCE "dss_criteria_dsd_id_seq" OWNED BY "dss_criteria"."dsc_id";
ALTER SEQUENCE "dss_master_dsm_id_seq" OWNED BY "dss_master"."dsm_id";
ALTER SEQUENCE "dss_participant_data_pad_field_id_seq" OWNED BY "participant_data"."pad_field_id";
ALTER SEQUENCE "dss_participant_data_pad_id_seq" OWNED BY "participant_data"."pad_id";
ALTER SEQUENCE "dss_participant_data_pad_participant_id_seq" OWNED BY "participant_data"."pad_participant_id";
ALTER SEQUENCE "dss_participant_pcp_id_seq" OWNED BY "participant"."pcp_id";
ALTER SEQUENCE "dss_result_detail_drd_id_seq" OWNED BY "dss_result_detail"."drd_id";
ALTER SEQUENCE "dss_result_dsr_id_seq" OWNED BY "dss_result"."dsr_id";
ALTER SEQUENCE "dss_result_dsr_master_id_seq" OWNED BY "dss_result"."dsr_master_id";
ALTER SEQUENCE "dss_result_dsr_participant_id_seq" OWNED BY "dss_result"."dsr_participant_id";
ALTER SEQUENCE "participant_field_pdf_id_seq" OWNED BY "participant_field"."pdf_id";
ALTER SEQUENCE "society_sct_id_seq" OWNED BY "society"."sct_id";
ALTER SEQUENCE "user_role_uar_account_id_seq" OWNED BY "user_role"."uar_account_id";
ALTER SEQUENCE "user_role_uar_id_seq" OWNED BY "user_role"."uar_id";
ALTER SEQUENCE "user_role_uar_role_id_seq" OWNED BY "user_role"."uar_role_id";
ALTER SEQUENCE "user_role_usr_id_seq" OWNED BY "role"."usr_id";

-- ----------------------------
-- Primary Key structure for table criteria
-- ----------------------------
ALTER TABLE "criteria" ADD PRIMARY KEY ("crt_id");

-- ----------------------------
-- Primary Key structure for table criteria_fuzzy
-- ----------------------------
ALTER TABLE "criteria_fuzzy" ADD PRIMARY KEY ("crf_id");

-- ----------------------------
-- Primary Key structure for table criteria_range_type
-- ----------------------------
ALTER TABLE "criteria_range_type" ADD PRIMARY KEY ("rgt_id");

-- ----------------------------
-- Primary Key structure for table dss_criteria
-- ----------------------------
ALTER TABLE "dss_criteria" ADD PRIMARY KEY ("dsc_id");

-- ----------------------------
-- Primary Key structure for table dss_master
-- ----------------------------
ALTER TABLE "dss_master" ADD PRIMARY KEY ("dsm_id");

-- ----------------------------
-- Primary Key structure for table dss_result
-- ----------------------------
ALTER TABLE "dss_result" ADD PRIMARY KEY ("dsr_id");

-- ----------------------------
-- Primary Key structure for table dss_result_detail
-- ----------------------------
ALTER TABLE "dss_result_detail" ADD PRIMARY KEY ("drd_id");

-- ----------------------------
-- Primary Key structure for table participant
-- ----------------------------
ALTER TABLE "participant" ADD PRIMARY KEY ("pcp_id");

-- ----------------------------
-- Primary Key structure for table participant_data
-- ----------------------------
ALTER TABLE "participant_data" ADD PRIMARY KEY ("pad_id");

-- ----------------------------
-- Primary Key structure for table participant_field
-- ----------------------------
ALTER TABLE "participant_field" ADD PRIMARY KEY ("pdf_id");

-- ----------------------------
-- Primary Key structure for table role
-- ----------------------------
ALTER TABLE "role" ADD PRIMARY KEY ("usr_id");

-- ----------------------------
-- Primary Key structure for table society
-- ----------------------------
ALTER TABLE "society" ADD PRIMARY KEY ("sct_id");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "user" ADD PRIMARY KEY ("uac_id");

-- ----------------------------
-- Primary Key structure for table user_role
-- ----------------------------
ALTER TABLE "user_role" ADD PRIMARY KEY ("uar_id");

-- ----------------------------
-- Foreign Key structure for table "criteria"
-- ----------------------------
ALTER TABLE "criteria" ADD FOREIGN KEY ("crt_parent_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "criteria_fuzzy"
-- ----------------------------
ALTER TABLE "criteria_fuzzy" ADD FOREIGN KEY ("crf_type_id") REFERENCES "criteria_range_type" ("rgt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "criteria_fuzzy" ADD FOREIGN KEY ("crf_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "dss_criteria"
-- ----------------------------
ALTER TABLE "dss_criteria" ADD FOREIGN KEY ("dsc_master_id") REFERENCES "dss_master" ("dsm_id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "dss_criteria" ADD FOREIGN KEY ("dsc_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "dss_result"
-- ----------------------------
ALTER TABLE "dss_result" ADD FOREIGN KEY ("dsr_master_id") REFERENCES "dss_master" ("dsm_id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "dss_result" ADD FOREIGN KEY ("dsr_participant_id") REFERENCES "participant" ("pcp_id") ON DELETE RESTRICT ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "dss_result_detail"
-- ----------------------------
ALTER TABLE "dss_result_detail" ADD FOREIGN KEY ("drd_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "dss_result_detail" ADD FOREIGN KEY ("drd_result_id") REFERENCES "dss_result" ("dsr_id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "participant"
-- ----------------------------
ALTER TABLE "participant" ADD FOREIGN KEY ("pcp_dss_id") REFERENCES "dss_master" ("dsm_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "participant" ADD FOREIGN KEY ("pcp_society_id") REFERENCES "society" ("sct_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "participant_data"
-- ----------------------------
ALTER TABLE "participant_data" ADD FOREIGN KEY ("pad_participant_id") REFERENCES "participant" ("pcp_id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "participant_data" ADD FOREIGN KEY ("pad_field_id") REFERENCES "participant_field" ("pdf_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "participant_field"
-- ----------------------------
ALTER TABLE "participant_field" ADD FOREIGN KEY ("pdf_criteria_id") REFERENCES "criteria" ("crt_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "user_role"
-- ----------------------------
ALTER TABLE "user_role" ADD FOREIGN KEY ("uar_account_id") REFERENCES "user" ("uac_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
ALTER TABLE "user_role" ADD FOREIGN KEY ("uar_role_id") REFERENCES "role" ("usr_id") ON DELETE RESTRICT ON UPDATE NO ACTION;
