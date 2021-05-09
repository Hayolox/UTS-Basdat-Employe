-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2021 pada 08.37
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SSN` (`id` INT)  BEGIN
		Delete from employee where ssn = id;
		Update employee set super_ssn = NULL where Super_ssn = id;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `Dnumber` int(1) NOT NULL,
  `Dname` varchar(20) DEFAULT NULL,
  `Mgr_ssn` int(10) DEFAULT NULL,
  `Mgr_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`Dnumber`, `Dname`, `Mgr_ssn`, `Mgr_start_date`) VALUES
(1, 'Headquarters', 888665555, '1981-06-19'),
(4, 'Administration', 987654321, '1995-01-01'),
(5, 'Research', 333445555, '1988-05-22');

--
-- Trigger `department`
--
DELIMITER $$
CREATE TRIGGER `DeleteDependent` BEFORE DELETE ON `department` FOR EACH ROW UPDATE employee SET employee.Dno = NULL WHERE employee.Dno = old.Dnumber
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dependent`
--

CREATE TABLE `dependent` (
  `Id_Dependent` int(11) NOT NULL,
  `Dependent_name` varchar(15) NOT NULL,
  `Essn` int(11) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Relationship` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dependent`
--

INSERT INTO `dependent` (`Id_Dependent`, `Dependent_name`, `Essn`, `sex`, `Bdate`, `Relationship`) VALUES
(6, 'Abner', 987654321, 'M', '1942-02-28', 'Spouse'),
(7, 'Michael', 123456789, 'M', '1988-01-04', 'Son'),
(8, 'Alice', 123456789, 'F', '1988-12-30', 'Daughter'),
(9, 'Elizabeth', 123456789, 'F', '1967-05-05', 'Spouse');

--
-- Trigger `dependent`
--
DELIMITER $$
CREATE TRIGGER `add_dependent` AFTER INSERT ON `dependent` FOR EACH ROW UPDATE employee SET employee.salary = employee.salary*1.05 WHERE employee.ssn = new.essn
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_dependent` AFTER DELETE ON `dependent` FOR EACH ROW UPDATE employee SET salary = salary/1.05 WHERE employee.ssn = old.essn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dept_locations`
--

CREATE TABLE `dept_locations` (
  `Dlocation` varchar(20) NOT NULL,
  `Dnumber` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dept_locations`
--

INSERT INTO `dept_locations` (`Dlocation`, `Dnumber`) VALUES
('Bellaire', 5),
('Houston', 1),
('Houston', 5),
('Stafford', 4),
('Sugarland', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `ssn` int(11) NOT NULL,
  `Fname` varchar(10) DEFAULT NULL,
  `Minit` char(1) DEFAULT NULL,
  `Lname` varchar(10) DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL,
  `Super_ssn` int(11) DEFAULT NULL,
  `Dno` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`ssn`, `Fname`, `Minit`, `Lname`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`) VALUES
(123456789, 'John', 'B', 'Smith', '1965-01-09', '731 Fondren, Houston, TX', 'M', 34729, 333445555, 5),
(333445555, 'Franklin', 'T', 'Wong', '1955-12-08', '638 Voss, Houston, TX', 'M', 46305, 888665555, 5),
(453453453, 'Joyce', 'A', 'English', '1972-07-31', '5631 Rice, Houston, TX', 'F', 25000, 333445555, 5),
(666884444, 'Ramesh', 'K', 'Narayan', '1962-09-15', '975 Fire Oak, Humble, TX', 'M', 38000, 333445555, 5),
(888665555, 'James', 'E', 'Bong', '1993-11-10', '450 Stone, Houston, TX', 'M', 55000, 0, 1),
(987654321, 'Jennifer', 'S', 'Wallace', '1941-06-20', '291 Berry, Bellaire, TX', 'F', 45150, 888665555, 4),
(987987987, 'Ahmad', 'V', 'Jabbar', '1969-03-29', '980 Dallas, Houston, TX', 'M', 25000, 987654321, 4),
(999887777, 'Alicia', 'J', 'Zelaya', '1968-01-19', '3321 Castle, Spring, TX', 'F', 25000, 987654321, 4);

--
-- Trigger `employee`
--
DELIMITER $$
CREATE TRIGGER `delete_employee` AFTER DELETE ON `employee` FOR EACH ROW BEGIN
	DELETE FROM dependent WHERE dependent.essn = old.ssn;
	UPDATE department SET mgr_ssn = NULL WHERE mgr_ssn = old.ssn;
	END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_employee2` BEFORE DELETE ON `employee` FOR EACH ROW DELETE FROM works_on WHERE works_on.essn = old.ssn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(3) NOT NULL,
  `essn` int(11) NOT NULL,
  `notif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `Pnumber` int(3) NOT NULL,
  `Pname` varchar(20) DEFAULT NULL,
  `Plocation` varchar(20) DEFAULT NULL,
  `Dnum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`Pnumber`, `Pname`, `Plocation`, `Dnum`) VALUES
(1, 'ProductX', 'Bellaire', 5),
(2, 'ProductY', 'Sugarland', 5),
(3, 'ProductZ', 'Houston', 5),
(10, 'Computerization', 'Stafford', 4),
(20, 'Reorganization', 'Houston', 1),
(30, 'Newbenefits', 'Stafford', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kil', 'akiklii72@gmail.com', NULL, '$2y$10$sSx0FcZQ06dRgOGYZotTEOHzjxUs5y6uaeN9yKtdDc5FlrG2qCh62', NULL, '2021-05-07 21:51:54', '2021-05-07 21:51:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `works_on`
--

CREATE TABLE `works_on` (
  `Id_Works` int(11) NOT NULL,
  `Essn` int(9) NOT NULL,
  `Pno` int(2) NOT NULL,
  `Hours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `works_on`
--

INSERT INTO `works_on` (`Id_Works`, `Essn`, `Pno`, `Hours`) VALUES
(6, 123456789, 1, 32.5),
(7, 123456789, 2, 7.5),
(8, 666884444, 3, 40),
(9, 453453453, 1, 20),
(10, 453453453, 2, 20),
(15, 999887777, 30, 30),
(16, 999887777, 10, 10),
(17, 987987987, 10, 35),
(18, 987987987, 30, 5),
(19, 987654321, 30, 20),
(20, 987654321, 20, 15);

--
-- Trigger `works_on`
--
DELIMITER $$
CREATE TRIGGER `cek_add_hours` AFTER INSERT ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = new.essn) > 40) THEN
	INSERT INTO notification(essn, notif) VALUES
		(new.essn,'Pegawai melewati batas jam kerja');
	ELSEIF ((SELECT SUM(hours) FROM works_on WHERE essn = new.essn) < 30) THEN
	INSERT INTO notification(essn, notif) VALUES
		(new.essn,'Pegawai memiliki jam kerja diabawah batas');
	END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cek_delete` AFTER DELETE ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) > 40) THEN
	INSERT INTO notification(essn, notif) VALUES
		(old.essn,'Pegawai melewati batas jam kerja');
	ELSEIF ((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) < 30) THEN
	INSERT INTO notification(essn, notif) VALUES
		(old.essn,'Pegawai memiliki jam kerja diabawah batas');
	END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cek_update` AFTER UPDATE ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) > 40) THEN
	INSERT INTO notification(essn, notif) VALUES
		(old.essn,'Pegawai melewati batas jam kerja');
	ELSEIF ((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) < 30) THEN
	INSERT INTO notification(essn, notif) VALUES
		(old.essn,'Pegawai memiliki jam kerja diabawah batas');
	END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusnotif_delete` BEFORE DELETE ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) <=40 AND (SELECT SUM(hours) FROM works_on WHERE essn = old.essn) >=30) THEN
	DELETE FROM notification  WHERE
		essn = old.essn;
 END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusnotif_insert` AFTER INSERT ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = new.essn) <=40 AND (SELECT SUM(hours) FROM works_on WHERE essn = new.essn) >=30) THEN
	DELETE FROM notification  WHERE
		essn = new.essn;
 END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapusnotif_update` AFTER UPDATE ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = new.essn) <=40 AND (SELECT SUM(hours) FROM works_on WHERE essn = new.essn) >=30) THEN
	DELETE FROM notification  WHERE
		essn = new.essn;
 END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `notifkosong` AFTER DELETE ON `works_on` FOR EACH ROW IF((SELECT SUM(hours) FROM works_on WHERE essn = old.essn) = NULL AND (SELECT SUM(hours) FROM works_on WHERE essn = old.essn) =NULL) THEN
	DELETE FROM notification  WHERE
		essn = old.essn;
 END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dnumber`);

--
-- Indeks untuk tabel `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`Id_Dependent`),
  ADD KEY `Essn` (`Essn`);

--
-- Indeks untuk tabel `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD PRIMARY KEY (`Dlocation`,`Dnumber`),
  ADD KEY `Dnumber` (`Dnumber`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ssn`),
  ADD KEY `Dno` (`Dno`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pnumber`),
  ADD KEY `Dnum` (`Dnum`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`Id_Works`),
  ADD KEY `Essn` (`Essn`),
  ADD KEY `Pno` (`Pno`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dependent`
--
ALTER TABLE `dependent`
  MODIFY `Id_Dependent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `works_on`
--
ALTER TABLE `works_on`
  MODIFY `Id_Works` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_ibfk_1` FOREIGN KEY (`Essn`) REFERENCES `employee` (`ssn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD CONSTRAINT `dept_locations_ibfk_1` FOREIGN KEY (`Dnumber`) REFERENCES `department` (`Dnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Dno`) REFERENCES `department` (`Dnumber`);

--
-- Ketidakleluasaan untuk tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Dnum`) REFERENCES `department` (`Dnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`Essn`) REFERENCES `employee` (`ssn`),
  ADD CONSTRAINT `works_on_ibfk_2` FOREIGN KEY (`Pno`) REFERENCES `project` (`Pnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
