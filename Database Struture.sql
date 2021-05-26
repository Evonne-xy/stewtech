CREATE TABLE Unsafe_Intersection(
   FIELD1            INTEGER  NOT NULL PRIMARY KEY 
  ,Long              NUMERIC(11,7) NOT NULL
  ,Lat               NUMERIC(12,8) NOT NULL
  ,INTERSECTION_NAME VARCHAR(46) NOT NULL
  ,sev_desc          VARCHAR(23) NOT NULL
  ,n                 INTEGER  NOT NULL
);