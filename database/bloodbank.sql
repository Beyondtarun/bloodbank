-- Creating Hospitals Table
CREATE TABLE Hospitals (
    hospital_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    hospital_name VARCHAR(100) NOT NULL
);

-- Creating Receivers Table
CREATE TABLE Receivers (
    receiver_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    blood_group VARCHAR(3) NOT NULL
);

-- Creating Blood Samples Table
CREATE TABLE BloodSamples (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    hospital_id INT,
    blood_type VARCHAR(3) NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (hospital_id) REFERENCES Hospitals(hospital_id)
);

-- Creating Requests Table
CREATE TABLE Requests (
    request_id INT PRIMARY KEY AUTO_INCREMENT,
    sample_id INT,
    receiver_id INT,
    status ENUM('pending', 'accepted') DEFAULT 'pending',
    FOREIGN KEY (sample_id) REFERENCES BloodSamples(sample_id),
    FOREIGN KEY (receiver_id) REFERENCES Receivers(receiver_id)
);
