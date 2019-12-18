CREATE TABLE `Students` (
  `Rollno` int,
  `S_name` varchar(255),
  `c_ID` varchar(255),
  `Group` varchar(255),
  `Dept_name` varchar(255),
  PRIMARY KEY (`Rollno`, `Group`)
);

CREATE TABLE `components` (
  `c_ID` varchar(255) PRIMARY KEY,
  `c_Name` varchar(255),
  `Quantity` int,
  `price` int,
  `images` varchar(255)
);

CREATE TABLE `issue` (
  `Dept_name` varchar(255),
  `Rollno` int NOT NULL,
  `Group_id` varchar(255) NOT NULL,
  `c_ID` varchar(255) NOT NULL,
  `issue_date` timestamp
);

CREATE TABLE `Group` (
  `Rollno` int,
  `Group_id` varchar(255)
);

ALTER TABLE `issue` ADD FOREIGN KEY (`c_ID`) REFERENCES `Students` (`Group`);
