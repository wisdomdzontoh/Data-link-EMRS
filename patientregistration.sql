CREATE TABLE patientregistration (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullName VARCHAR(255) NOT NULL,
  DOB DATE NOT NULL,
  email VARCHAR(255),
  phoneNumber VARCHAR(255) NOT NULL,
  gender ENUM('male', 'female') NOT NULL,
  Occupation VARCHAR(255) NOT NULL,
  opdNumber VARCHAR(255) NOT NULL,
  age INT NOT NULL,
  ageGroup ENUM('0-28 days', '1-11 months', '1-4 Years', '5-9 Years', '10-14 Years', '15-17 Years', '18-19 Years', '20-34 Years', '35- 49 Years', '50-59 Years', '60-69 Years', '70 Yrs & Above') NOT NULL,
  clientStatus ENUM('insured', 'non-insured') NOT NULL,
  NHISnumber INT NOT NULL,
  dateOfVisit DATE NOT NULL,
  address VARCHAR(255) NOT NULL,
  nationality ENUM('Ghanaiain', 'Other nationality') NOT NULL,
  houseNumber VARCHAR(255),
  clientType ENUM('new client', 'old client') NOT NULL,
  nameOfGuardian VARCHAR(255) NOT NULL,
  phoneOfGuardian VARCHAR(255) NOT NULL
);
