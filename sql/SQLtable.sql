CREATE TABLE CheckIn_t (
    UnitID INT(9) NOT NULL Auto_Increment,
    UnitName VARCHAR(255) NOT NULL,
    Council VARCHAR(255),
    Campsite VARCHAR(255) NOT NULL,
    Checkout TIME,
    Roster BOOLEAN,
    Sched BOOLEAN,
    Paid BOOLEAN,
    Inventory BOOLEAN,
    Archery VARCHAR(255),
    Shotgun TIME,
    CheckoutGroup INT(1),
    CONSTRAINT CheckIn_PK PRIMARY KEY (UnitID)
) Auto_Increment = 1;