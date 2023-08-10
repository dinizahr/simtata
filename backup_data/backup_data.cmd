set sekarang=%DATE:~6,4%%DATE:~3,2%%DATE:~0,2%_%time:~0,2%%time:~3,2%%time:~6,2%
cd C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin
mysqldump -u root app_tabungan > C:\laragon\www\simtata\backup_data\backup_data_%sekarang%.sql