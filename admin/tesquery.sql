SELECT f.*, s.*, si.*, a.*, js.*, ks.*, w.*, wa.*
    FROM fakta f    
    
    -- Join tabel sekolah, siswa, akreditasi, jenis_sekolah, kategori_sekolah, wilayah, waktu
    INNER JOIN sekolah s ON f.nis = s.nis 
    INNER JOIN siswa si ON f.induk = si.induk
    INNER JOIN akreditasi a ON s.kodea = a.kodea
    INNER JOIN jenis_sekolah js ON s.kodejs = js.kodejs
    INNER JOIN kategori_sekolah ks ON s.kodeks = ks.kodeks
    INNER JOIN wilayah w ON s.kodewi = w.kodewi
    INNER JOIN waktu wa ON f.kodewa = wa.kodewa
    
    -- Kondisi Fakta
    WHERE f.status != 'delete'    
    AND f.tanggal IN (SELECT MAX(tanggal) FROM fakta f2 WHERE f.induk = f2.induk)
    
    -- Kondisi Sekolah
    AND s.status != 'delete' 
    AND s.tanggal IN (SELECT MAX(tanggal) FROM sekolah s2 WHERE s2.nis = s.nis)
    
    -- Kondisi Siswa
    AND si.status != 'delete'
    AND si.tanggal IN (SELECT MAX(tanggal) FROM siswa si2 WHERE si.induk = si2.induk)
    
    -- Kondisi Akreditasi
    AND a.status != ' delete'
    AND a.tanggal IN (SELECT MAX(tanggal) FROM akreditasi a2 WHERE a.kodea = a2.kodea)
    
    -- Kondisi Jenis Sekolah SMA / SMK / MA
    AND js.status != ' delete'
    AND js.tanggal IN (SELECT MAX(tanggal) FROM jenis_sekolah js2 WHERE js2.kodejs = js.kodejs)
    
    -- Kondisi Kategori Sekolah Negeri / Swasta
    AND ks.status != ' delete'
    AND ks.tanggal IN (SELECT MAX(tanggal) FROM kategori_sekolah ks2 WHERE ks2.kodeks = ks.kodeks)
    
    -- Kondisi Wilayah
    AND w.status != ' delete'
    AND w.tanggal IN (SELECT MAX(tanggal) FROM wilayah w2 WHERE w2.kodewi = w.kodewi)
    
    -- kondisi waktu
    AND wa.status !='delete'
    AND wa.tanggal IN (SELECT MAX(tanggal) FROM waktu wa2 WHERE wa2.kodewa =wa.kodewa)
    
    
    -- Kondisi Jurusan Siswa // Tidak tampil di depan