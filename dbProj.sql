CREATE TABLE items (

	itemID int PRIMARY KEY IDENTITY(1,1),
	itemName nchar(50),
	itemPrice int,

);

CREATE TABLE Basket (

	basketID int PRIMARY KEY IDENTITY(1,1),
	itemID int,
	amount int,

	FOREIGN KEY (itemID) REFERENCES items(itemID) ON DELETE SET NULL
);


CREATE TABLE Users (

	userID int PRIMARY KEY IDENTITY(1,1),
	username nchar(20) NOT NULL,
	hashedPw nchar(128) NOT NULL,
	basketID int,

	FOREIGN KEY (basketID) REFERENCES Basket(basketID) ON DELETE SET NULL
);