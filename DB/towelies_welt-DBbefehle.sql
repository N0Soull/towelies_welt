CREATE TABLE Kunde (
    Kunden_ID INT PRIMARY KEY,
    Age INT,
    Adresse TEXT
);

CREATE TABLE Produkt (
    Produkt_ID INT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Typ VARCHAR(255),
    Art VARCHAR(255),
    Prozentwert INT,
    Preis DECIMAL(10,2),
    Bestand INT
);

CREATE TABLE Lager (
    Lager_ID INT PRIMARY KEY,
    Produkt_ID INT,
    Bestand INT,
    FOREIGN KEY (Produkt_ID) REFERENCES Produkt(Produkt_ID)
);

CREATE TABLE Transaktion (
    Transaktion_ID INT PRIMARY KEY AUTO_INCREMENT,
    Kunden_ID INT,
    Menge DECIMAL(10,2),
    Adresse TEXT,
    GesamtPreis DECIMAL(10,2),
    FOREIGN KEY (Kunden_ID) REFERENCES Kunde(Kunden_ID)
);

CREATE TABLE Mitarbeiter (
    Mitarbeiter_ID INT PRIMARY KEY,
    Position VARCHAR(255),
    Name VARCHAR(255),
    Lager_ID INT,
    FOREIGN KEY (Lager_ID) REFERENCES Lager(Lager_ID)
);
