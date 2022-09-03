CREATE TABLE IF NOT EXISTS penjualan_user_pivot (
	id BIGINT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id VARCHAR(255) NOT NULL,
	no_faktur VARCHAR(255) NOT NULL,
	has_seen INT(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE penjualan_user_pivot
	ADD CONSTRAINT penjualan_user_pivot_user_id
		FOREIGN KEY (user_id)
			REFERENCES users(id_user);

ALTER TABLE penjualan_user_pivot
	ADD CONSTRAINT penjualan_user_pivot_penjualan_id
		FOREIGN KEY (no_faktur)
			REFERENCES penjualan(no_faktur);
