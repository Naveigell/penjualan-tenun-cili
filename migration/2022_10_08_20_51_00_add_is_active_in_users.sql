ALTER TABLE users ADD COLUMN is_active INTEGER DEFAULT 0 AFTER kode_cabang;
UPDATE users SET is_active = 1 WHERE 1;
