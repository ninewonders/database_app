CREATE TABLE PATIENT (
  CIN INTEGER(5) PRIMARY KEY,
  NOM VARCHAR(10),
  PRENOM VARCHAR(10),
  GENRE VARCHAR(10),
  DATE_NAISSANCE DATE
);

CREATE TABLE CONSULTATIONS (
  ID_CONSULT INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  DATE_CONSULT DATE,
  TAILLE INTEGER(3),
  POIDS INTEGER(3)
  CIN_PATIENT INT(5),
  FOREIGN KEY (CIN_PATIENT) REFERENCES PATIENT(CIN)
);

CREATE TABLE MEDICAMENT (
  ID_MEDIC INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  NOM VARCHAR(15),
  PRESENTATION BOOLEAN,
);

CREATE TABLE ORDONNANCE (
  NUM_ORDONNANCE INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  ID_MEDIC INTEGER,
  DATE_ORDONNANCE DATE,
  CIN_PATIENT INT,
  FOREIGN KEY (CIN_PATIENT) REFERENCES PATIENT(CIN),
  FOREIGN KEY (ID_MEDIC) REFERENCES MEDICAMENT(ID_MEDIC)
);

CREATE TABLE CERTIFICAT_MEDICAL (
  NUM_CERTIF INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  NB_JRS_REPOS INT,
  DATE_REPOS DATE,
  CIN_PATIENT INT,
  FOREIGN KEY (CIN_PATIENT) REFERENCES PATIENT(CIN)
);

CREATE TABLE RENDEZ_VOUS (
  ID_RDV INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  DATE_RDV DATE,
  HEURE_RDV INT,
  CIN_PATIENT INT,
  FOREIGN KEY (CIN_PATIENT) REFERENCES PATIENT(CIN)
);

CREATE TABLE FACTURE (
  ID_FACTURE INT PRIMARY KEY,
  PRIX DOUBLE,
  CIN_PATIENT INT,
  FOREIGN KEY (CIN_PATIENT) REFERENCES PATIENT(CIN)
);

php artisan make:model patients -m
php artisan make:model consultations -m
php artisan make:model medicaments -m
php artisan make:model ordonnances -m
php artisan make:model certificat_medical -m
php artisan make:model rendez_vous -m
php artisan make:model factures -m

php artisan make:controller PatientContoller --resource
php artisan make:controller ConsultationContoller --resource
php artisan make:controller MedicamentContoller --resource
php artisan make:controller OrdonnanceContoller --resource
php artisan make:controller CertificatMedicalContoller --resource
php artisan make:controller RendezVousContoller --resource
php artisan make:controller factureContoller --resource
