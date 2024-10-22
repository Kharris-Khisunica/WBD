import psycopg2 as psy

# kalau mau pakai, jangan lupa ganti user dan passwordnya
connection = psy.connect(dbname = "linkinpurry", user="postgres", password="", host= "localhost", port="5433")
connection.autocommit = True
cursor = connection.cursor()

# deleting former data
cursor.execute("delete from lamaran")
cursor.execute("delete from attachment_lowongan")
cursor.execute("delete from lowongan")
cursor.execute("delete from company_detail")
cursor.execute("delete from users")

# resetting sequences
cursor.execute("alter sequence attachment_lowongan_attachment_id_seq restart with 1")
cursor.execute("alter sequence lamaran_lamaran_id_seq restart with 1")
cursor.execute("alter sequence lowongan_lowongan_id_seq restart with 1")
cursor.execute("alter sequence users_user_id_seq restart with 1")