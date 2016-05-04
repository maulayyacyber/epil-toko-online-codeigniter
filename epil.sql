-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Nopember 2011 jam 09:24
-- Versi Server: 5.1.37
-- Versi PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `KodePembelian` char(5) NOT NULL,
  `KodeProduk` varchar(7) NOT NULL,
  `BeratBeli` double NOT NULL,
  `HargaBeli` double NOT NULL,
  PRIMARY KEY (`KodePembelian`,`KodeProduk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`KodePembelian`, `KodeProduk`, `BeratBeli`, `HargaBeli`) VALUES
('10081', 'TN05', 12, 1),
('10080', 'SL05', 22, 12),
('10079', 'CK008', 1, 12),
('10077', 'CK008', 1, 1),
('10068', 'CM001', 12, 10),
('10068', 'SL05', 10, 10),
('10078', 'CK008', 23, 2),
('10070', 'CK008', 10, 1),
('10064', 'MJ02', 10, 10),
('10069', 'BP001', 12, 10),
('10061', 'CK008', 10, 10),
('10062', 'CK008', 10, 10),
('10073', 'BP001', 5, 5),
('10061', 'SL05', 20, 12),
('10061', 'MJ02', 10, 10),
('10077', 'BP001', 3, 3),
('10075', 'B394', 13, 2),
('10076', 'TN05', 4, 2),
('10074', 'B394', 1, 1),
('10068', 'B394', 12, 10),
('10060', 'MJ02', 11, 11),
('10060', 'TN05', 14, 10),
('10060', 'A099', 110, 12),
('10060', 'CK008', 100, 9),
('10060', 'CK010', 30, 11),
('10060', 'BP005', 15, 15),
('10060', 'SL05', 10, 8),
('10073', 'SL05', 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `KodePenjualan` int(11) NOT NULL,
  `KodeProduk` varchar(7) NOT NULL,
  `BeratJual` double NOT NULL,
  `HargaJual` double NOT NULL,
  PRIMARY KEY (`KodePenjualan`,`KodeProduk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`KodePenjualan`, `KodeProduk`, `BeratJual`, `HargaJual`) VALUES
(13, 'BP001', 23, 7),
(1, 'C399', 0, 0),
(2, 'TN05', 13, 30),
(2, 'MJ02', 14, 10),
(3, 'CK010', 67, 78),
(3, 'CM001', 23, 12),
(2, 'CM001', 34, 8),
(8, 'B394', 10, 80),
(11, 'CM001', 45, 8),
(8, 'KP009', 11, 20),
(1, 'SL05', 50, 20),
(20, 'BP001', 11, 7),
(1, 'TN05', 12, 30),
(55, 'BP001', 23, 7),
(5, 'CK012', 12, 15),
(5, 'TN05', 34, 30),
(9, 'CM001', 90, 8),
(9, 'BP001', 90, 7),
(9, 'CK008', 90, 8),
(2, 'B394', 13, 8),
(19, 'TN05', 12, 30),
(7, 'LY006', 10, 13),
(7, 'CM001', 10, 80),
(22, 'SL05', 67, 20),
(8, 'LY006', 10, 13),
(55, 'B394', 15, 8),
(42, 'KP009', 12, 20),
(46, 'TN05', 34, 3),
(46, 'A099', 10, 11),
(23, 'TN05', 12, 30),
(13, 'BP005', 13, 12),
(22, 'CK008', 100, 8),
(22, 'LY006', 100, 13),
(22, 'MJ02', 100, 10),
(18, 'CK008', 100, 8),
(18, 'TN05', 125, 30),
(23, 'SL05', 13, 20),
(25, 'TN05', 12, 30),
(26, 'TN05', 12, 30),
(27, 'TN05', 12, 30),
(28, 'TN05', 12, 30),
(29, 'TN05', 12, 30),
(30, 'TN05', 12, 30),
(31, 'TN05', 12, 30),
(32, 'TN05', 12, 30),
(33, 'TN05', 12, 30),
(34, 'TN05', 12, 30),
(45, 'KP009', 67, 20),
(36, 'B394', 10, 8),
(37, 'CK008', 12, 8),
(38, 'B394', 20, 8),
(45, 'TG006', 56, 2),
(40, 'KP009', 100, 20),
(41, 'BP001', 14, 7),
(42, 'TG006', 23, 2),
(42, 'B394', 34, 8),
(43, 'KP009', 45, 20),
(43, 'B394', 24, 8),
(44, 'TG006', 78, 2),
(44, 'KP009', 78, 20),
(46, 'TG006', 50, 2),
(46, 'KP009', 10, 10),
(46, 'SL05', 50, 10),
(46, 'CM001', 60, 5),
(47, 'KP009', 5, 20),
(47, 'TN05', 10, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `KodeMenu` int(11) NOT NULL AUTO_INCREMENT,
  `NamaMenu` varchar(25) NOT NULL,
  `Keterangan` text NOT NULL,
  `StatusMenu` enum('Enable','Disable') NOT NULL,
  `IsiMenu` text NOT NULL,
  PRIMARY KEY (`KodeMenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`KodeMenu`, `NamaMenu`, `Keterangan`, `StatusMenu`, `IsiMenu`) VALUES
(2, 'Term', 'Menu ini berfungsi untuk menampilkan aturan dan tata cara dalam proses jual - beli.', 'Enable', '<!--[if gte mso 9]><xml>\n <w:WordDocument>\n  <w:View>Normal</w:View>\n  <w:Zoom>0</w:Zoom>\n  <w:TrackMoves/>\n  <w:TrackFormatting/>\n  <w:PunctuationKerning/>\n  <w:ValidateAgainstSchemas/>\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\n  <w:DoNotPromoteQF/>\n  <w:LidThemeOther>IN</w:LidThemeOther>\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\n  <w:Compatibility>\n   <w:BreakWrappedTables/>\n   <w:SnapToGridInCell/>\n   <w:WrapTextWithPunct/>\n   <w:UseAsianBreakRules/>\n   <w:DontGrowAutofit/>\n   <w:SplitPgBreakAndParaMark/>\n   <w:DontVertAlignCellWithSp/>\n   <w:DontBreakConstrainedForcedTables/>\n   <w:DontVertAlignInTxbx/>\n   <w:Word11KerningPairs/>\n   <w:CachedColBalance/>\n  </w:Compatibility>\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\n  <m:mathPr>\n   <m:mathFont m:val="Cambria Math"/>\n   <m:brkBin m:val="before"/>\n   <m:brkBinSub m:val="-->\n   <m:smallfrac m:val="off">\n   <m:dispdef>\n   <m:lmargin m:val="0">\n   <m:rmargin m:val="0">\n   <m:defjc m:val="centerGroup">\n   <m:wrapindent m:val="1440">\n   <m:intlim m:val="subSup">\n   <m:narylim m:val="undOvr">\n  </m:narylim></m:intlim>\n</m:wrapindent><!--[endif]--><!--[if gte mso 9]><xml>\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\n  LatentStyleCount="267">\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Table Grid"/>\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\n </w:LatentStyles>\n</xml><![endif]--><!--[if gte mso 10]>\n<style>\n /* Style Definitions */\n table.MsoNormalTable\n	{mso-style-name:"Table Normal";\n	mso-tstyle-rowband-size:0;\n	mso-tstyle-colband-size:0;\n	mso-style-noshow:yes;\n	mso-style-priority:99;\n	mso-style-qformat:yes;\n	mso-style-parent:"";\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\n	mso-para-margin-top:0cm;\n	mso-para-margin-right:0cm;\n	mso-para-margin-bottom:10.0pt;\n	mso-para-margin-left:0cm;\n	line-height:115%;\n	mso-pagination:widow-orphan;\n	font-size:11.0pt;\n	font-family:"Calibri","sans-serif";\n	mso-ascii-font-family:Calibri;\n	mso-ascii-theme-font:minor-latin;\n	mso-hansi-font-family:Calibri;\n	mso-hansi-theme-font:minor-latin;\n	mso-bidi-font-family:"Times New Roman";\n	mso-bidi-theme-font:minor-bidi;\n	mso-fareast-language:EN-US;}\n</style>\n<![endif]--><br>The price that shown in this website is for <span style="font-weight: bold;">singapore</span>. Customer for another country may contact us for more detail information about price.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">We always try to give the latest price, but for sure we recomended our costumer to send an <span style="font-weight: bold;">email </span>to our contact to get the <span style="font-weight: bold;">latest price</span>.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">Price may change anytime without notification before.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup"><span style="font-weight: bold;">Shiping cost</span> was include in price.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">Ordered roducts will be deliver as soon as we got the payment.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">How long the time of shipping products depend on the distance.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">The order is <span style="font-weight: bold;">confirm </span>when there is <span style="font-weight: bold;">money transfer</span> to our bank account PT. Mitra Semesta.<br><br></m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac><m:smallfrac m:val="off"><m:dispdef><m:lmargin m:val="0"><m:rmargin m:val="0"><m:defjc m:val="centerGroup">Ordered products <span style="font-weight: bold;">cant be return</span> except there is an agreement with our company.<br><br>\n\n</m:defjc></m:rmargin></m:lmargin></m:dispdef></m:smallfrac>'),
(3, 'Contact Us', 'Merupakan menu yang berfungsi untuk menampilkan alamat, email, dan no telepon yang dapat dihubungi oleh pelanggan.', 'Enable', '<h2><big>Here is our phone number &nbsp;&nbsp; [+62-24-123-123]&nbsp;&nbsp;</big>&nbsp; </h2>Representative are available 8.00 am - 5.00 pm Asian Time, 7 days a week.<br><br>If you are deaf, hard hearing, or speech impairad we invite you to contact us through email,<br><br>Here is our email address <span style="font-weight: bold;">mitrasemesta@yahoo.co.id</span> or our YM : <span style="font-style: italic;">mitrasemesta</span> ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `KodeNegara` varchar(5) NOT NULL,
  `NamaNegara` varchar(15) NOT NULL,
  PRIMARY KEY (`KodeNegara`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`KodeNegara`, `NamaNegara`) VALUES
('INA', 'Indonesia'),
('SGP', 'Singapore'),
('DLL', 'Negara Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `KodePegawai` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPegawai` varchar(30) NOT NULL,
  `JenisKelamin` char(1) NOT NULL,
  `TempatLahir` varchar(20) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `AlmtPegawai` varchar(50) DEFAULT NULL,
  `NoTelepon` varchar(12) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `TanggalMasuk` date NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(35) NOT NULL,
  PRIMARY KEY (`KodePegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`KodePegawai`, `NamaPegawai`, `JenisKelamin`, `TempatLahir`, `TanggalLahir`, `AlmtPegawai`, `NoTelepon`, `Email`, `TanggalMasuk`, `Level`, `Username`, `Password`) VALUES
(1, 'Septaria Andriyani', 'P', 'Semarang', '2011-06-15', 'Jl. Jatisari no III Tembalang Semarang', '083331338934', 'pegawai@yahoo.com', '2011-06-15', 'Admin', 'admin', '5136850b6c8f3ebc66122188347efda0'),
(2, 'Vino G. Sbastian', 'L', 'smg', '2011-07-01', 'Jl. Arteri Soekarno Hatta No 123A', '0833313389', 'manajer@yahoo.com', '2011-07-05', 'Manajer', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0'),
(3, 'Emmi Kurnia Sari H', 'P', 'Klaten', '2011-07-03', 'Jl. Tlogo Sari Raya, Blok G no. 45B', '024123123', 'emonk@yahoo.com', '2011-07-09', 'Pegawai', 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a'),
(7, 'Dinda Puspita', 'P', 'Semarang', '1993-10-06', 'Jl. Majapahit Gg. Kusuma No.12 Semarang', '024123123', 'thinkrifa@ymail.com', '2011-10-01', 'Pegawai', 'dindadin', 'b7a8af5f3583d4b08b1c895a9dedd38a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `KodePelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(30) NOT NULL,
  `JenisKelamin` enum('Male','Female') NOT NULL,
  `TempatLahir` varchar(20) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `AlmtPelanggan` varchar(100) NOT NULL,
  `NoTelepon` varchar(12) NOT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Kota` varchar(20) NOT NULL,
  `Negara` varchar(25) NOT NULL,
  `KodePos` int(5) NOT NULL,
  `TanggalDaftar` date NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(35) NOT NULL,
  PRIMARY KEY (`KodePelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`KodePelanggan`, `NamaPelanggan`, `JenisKelamin`, `TempatLahir`, `TanggalLahir`, `AlmtPelanggan`, `NoTelepon`, `Email`, `Kota`, `Negara`, `KodePos`, `TanggalDaftar`, `Username`, `Password`) VALUES
(7, 'Okti Nindyati', 'Female', 'Semarang', '1988-10-03', 'Jl. Sirajudin, Gg. Jatisari III no 8, Tembalang, Semarang, Jawa Tengah', '08133313131', 'Pinkylope@yahoo.com', 'Siamang', 'Singapore', 12345, '2011-10-03', 'pinkylope', '3ef382d9da34b1db19c6130bf8e8605a'),
(8, 'kuthux', 'Male', 'Magelang', '1988-04-11', 'Kapling Gianti Temanggung', '081333333331', 'kuthux@yahoo.com', 'Sidney', 'Australia', 12345, '0000-00-00', 'kuthux', 'd41d8cd98f00b204e9800998ecf8427e'),
(17, 'anggun hera steffiani', 'Female', 'salatiga', '2011-11-22', 'St. Lauren 234, Sidney', '085640445003', 'hera.anggun@yahoo.com', 'Sidney', 'Australia', 57564, '2011-11-07', 'anggunhera', 'd60c6bc2f80b83391e8d607cb09e006a'),
(16, 'dian arifiyani', 'Female', 'Paris', '2011-11-28', 'St. Eves 78, Singapore', '085640556044', 'day_capunk@yahoo.com', 'Eden', 'Singapore', 46623, '2011-11-06', 'DayCapunk', '047b91e722477f1f19d7a9afd314555f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `KodePemasok` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPemasok` varchar(30) NOT NULL,
  `JenisKelamin` enum('L','P') NOT NULL,
  `AlmtPemasok` varchar(50) DEFAULT NULL,
  `NoTelepon` varchar(12) DEFAULT NULL,
  `Kredibilitas` char(1) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Kota` varchar(20) NOT NULL,
  PRIMARY KEY (`KodePemasok`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11117 ;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`KodePemasok`, `NamaPemasok`, `JenisKelamin`, `AlmtPemasok`, `NoTelepon`, `Kredibilitas`, `Email`, `Kota`) VALUES
(1, 'Okti Nindyati', 'P', 'Jatisari III no 8, Tembalang, Semarang', '085612341234', 'B', 'pinkylope@yahoo.com', 'klaten'),
(2, 'Arde Radihatna', 'L', 'Tirtahusada timur, Blok XA No.15, Semarang Timur', '024256124', 'A', 'arcompany@yahoo.com', 'semarang'),
(3, 'Diandra Mahadewi', 'P', 'Jl. Pemuda Jaya 125, Batang, Pekalongan', '08333133893', 'A', 'diandramahadewi@gmail.com', 'Pekalongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `KodePembelian` int(11) NOT NULL AUTO_INCREMENT,
  `KodePemasok` char(5) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total` double NOT NULL,
  `KodePegawai` char(5) NOT NULL,
  PRIMARY KEY (`KodePembelian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10082 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`KodePembelian`, `KodePemasok`, `Tanggal`, `Total`, `KodePegawai`) VALUES
(10068, '1', '2011-10-05', 340, '3'),
(10075, '1', '2011-11-08', 26, '3'),
(10070, '1', '2011-10-06', 10, '3'),
(10069, '1', '2011-10-05', 120, '3'),
(10061, '3', '2011-09-28', 440, '3'),
(10081, '3', '2011-11-08', 12, '3'),
(10080, '3', '2011-11-08', 264, '3'),
(10079, '2', '2011-11-08', 12, '3'),
(10078, '1', '2011-11-08', 46, '3'),
(10077, '1', '2011-11-08', 10, '3'),
(10076, '1', '2011-11-08', 8, '3'),
(10074, '1', '2011-11-08', 1, '3'),
(10073, '1', '2011-11-01', 45, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `KodePenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `KodePelanggan` char(5) NOT NULL,
  `Tanggal` date NOT NULL,
  `TotalHarga` double NOT NULL,
  `KodePegawai` char(5) NOT NULL,
  `Status` enum('Pesan','Beli','Batal') NOT NULL,
  PRIMARY KEY (`KodePenjualan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`KodePenjualan`, `KodePelanggan`, `Tanggal`, `TotalHarga`, `KodePegawai`, `Status`) VALUES
(44, '7', '2011-10-25', 1716, '', 'Pesan'),
(23, '7', '2011-10-18', 620, '3', 'Beli'),
(3, '5', '2011-07-23', 580, '3', 'Beli'),
(9, '7', '2011-08-06', 2070, '3', 'Beli'),
(11, '7', '2011-08-12', 360, '3', 'Batal'),
(47, '17', '2011-11-07', 400, '', 'Pesan'),
(13, '7', '2011-08-13', 317, '3', 'Beli'),
(43, '7', '2011-10-20', 1092, '', 'Pesan'),
(42, '7', '2011-10-20', 558, '', 'Pesan'),
(16, '7', '2011-09-14', 861, '3', 'Beli'),
(18, '7', '2011-09-14', 4550, '3', 'Beli'),
(19, '7', '2011-09-14', 360, '3', 'Beli'),
(20, '7', '2011-09-14', 77, '3', 'Beli'),
(22, '7', '2011-09-28', 3100, '3', 'Beli'),
(30, '7', '2011-10-18', 360, '3', 'Beli'),
(29, '7', '2011-10-18', 360, '3', 'Beli'),
(28, '7', '2011-10-18', 360, '3', 'Beli'),
(25, '7', '2011-10-18', 360, '3', 'Beli'),
(26, '7', '2011-10-18', 360, '3', 'Beli'),
(41, '7', '2011-10-18', 98, '3', 'Beli'),
(40, '7', '2011-10-18', 2000, '3', 'Beli'),
(45, '7', '2011-10-30', 1452, '', 'Pesan'),
(38, '7', '2011-10-18', 160, '3', 'Beli'),
(37, '7', '2011-10-18', 96, '3', 'Beli'),
(36, '7', '2011-10-18', 80, '3', 'Beli'),
(46, '7', '2011-11-07', 1212, '3', 'Batal'),
(34, '7', '2011-10-18', 360, '', 'Pesan'),
(33, '7', '2011-10-18', 360, '', 'Pesan'),
(32, '7', '2011-10-18', 360, '', 'Pesan'),
(31, '7', '2011-10-18', 360, '', 'Pesan'),
(27, '7', '2011-10-18', 360, '3', 'Batal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `KodeProduk` varchar(7) NOT NULL,
  `NamaProduk` varchar(20) NOT NULL,
  `Kualitas` enum('A','B') DEFAULT NULL,
  `Berat` double NOT NULL,
  `HargaKiloan` double NOT NULL,
  `NamaFoto` varchar(30) NOT NULL,
  PRIMARY KEY (`KodeProduk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`KodeProduk`, `NamaProduk`, `Kualitas`, `Berat`, `HargaKiloan`, `NamaFoto`) VALUES
('TG006', 'Mackarel', 'A', 0.06, 5.5, 'TG006.jpg'),
('LY006', 'Ribbon Fish', 'A', 0.06, 3, 'LY006.jpeg'),
('KP009', 'Crab', 'A', 60, 20, 'KP009.jpg'),
('A099', 'Shrimp', 'A', 60, 11, 'A099.jpeg'),
('SL05', 'Salmon', 'A', 0.5, 20, 'SL05.gif'),
('CM001', 'Squid', 'A', 0.01, 8, 'CM001.jpg'),
('TN05', 'Bluefin Tuna', 'A', 0.5, 30, 'TN05.jpg'),
('CK008', 'Skipjack Tuna', 'A', 0.08, 8, 'CK008.gif'),
('B394', 'Kuro Fish', 'A', 1.5, 8, 'B3941.jpg'),
('BP001', 'White Promfet', 'A', 0.01, 7, 'BP001.jpeg'),
('BP005', 'White Promfet', 'A', 0.05, 12, 'BP005.jpeg'),
('CK010', 'Skipjack Tuna', 'A', 0.1, 13, 'CK010.gif'),
('CK012', 'Skipjack Tuna', 'A', 0.12, 15, 'CK012.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
