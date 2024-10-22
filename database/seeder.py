import psycopg2 as psy
from faker import Faker
import random

fake = Faker()
# kalau mau pakai, jangan lupa ganti user dan passwordnya
connection = psy.connect(dbname = "linkinpurry", user="postgres", password="2904", host= "localhost", port="5433")
connection.autocommit = True
cursor = connection.cursor()

# deleting former data
cursor.execute("delete from lamaran")
cursor.execute("delete from attachment_lowongan")
cursor.execute("delete from lowongan")
cursor.execute("delete from company_detail")
cursor.execute("delete from jobseeker_detail")
cursor.execute("delete from users")

# resetting sequences
cursor.execute("alter sequence attachment_lowongan_attachment_id_seq restart with 1")
cursor.execute("alter sequence lamaran_lamaran_id_seq restart with 1")
cursor.execute("alter sequence lowongan_lowongan_id_seq restart with 1")
cursor.execute("alter sequence users_user_id_seq restart with 1")

# adding data
roletype = ["jobseeker", "company"]
jenis_pekerjaan_type = ['fulltime', 'parttime', 'internship'];
jenis_lokasi_type = ['onsite', 'remote', 'hybrid'];
kategori_pekerjaan_type = ['accounting and finance', 'business, consulting, and management', 'creative arts',  'engineering and manufacturing', 'law enforcement', 'marketing', 'law', 'information technology', 'marketing', 'retail', 'healthcare', 'pharmaceutical', 'administration', 'teaching']
status_type = ['accepted', 'rejected', 'waiting']
companies = []
jobseekers=[]
for i in range (1,21):
    row = [fake.email(), fake.word(), roletype[random.randint(0,1)]]
    if (row[2] == "company"):
        companies.append(i)
        row.append(fake.company())
        row[0] = fake.company_email();
    else:
        jobseekers.append(i)
        row.append(fake.name())
    cursor.execute(
                "INSERT INTO users (email, password, role, nama) VALUES ('%s', '%s', '%s', '%s')" % \
                (row[0], row[1], row[2], row[3]))

for i in companies:
    row = [fake.address().replace("'", ""), fake.paragraph()[:500].replace("'", ""), kategori_pekerjaan_type[random.randint(0,len(kategori_pekerjaan_type)-1)], fake.file_path(depth=3,extension='jpg')[:120]]
    cursor.execute("INSERT INTO company_detail (user_id, lokasi, about, bidang, pp_path) VALUES (%s, '%s', '%s', '%s', '%s')" % \
                (i, row[0], row[1], row[2], row[3]))   
    
for i in jobseekers:
    row = [fake.catch_phrase().replace("'", ""), fake.paragraph()[:500].replace("'", ""), fake.paragraph()[:1000].replace("'", ""), (fake.job() +' at '+fake.company() + ' for ' + str(random.randint(1,15)) + ' years.'), fake.file_path(depth=3,extension='jpg')[:120]]
    cursor.execute("INSERT INTO jobseeker_detail (user_id, skill, edukasi, about, experience, pp_path) VALUES (%s, '%s', '%s', '%s', '%s', '%s')" % \
                (i, row[0], row[1], row[2], row[3], row[4]))   
 
for j in range (2):
    n = len(companies)*j + 1   
    for i in (companies):
        row = [fake.job()[:50].replace("'", ""), fake.paragraph()[:500].replace("'", ""), jenis_pekerjaan_type[random.randint(0,2)], jenis_lokasi_type[random.randint(0,2)], kategori_pekerjaan_type[random.randint(0,len(kategori_pekerjaan_type)-1)],random.randint(0,1), fake.date_time(), fake.date_time()] 
        cursor.execute("INSERT INTO lowongan (company_id, posisi, deskripsi, jenis_pekerjaan, jenis_lokasi, kategori_pekerjaan, is_open, created_at, updated_at) \
                VALUES (%s, '%s', '%s', '%s', '%s', '%s', '%s','%s', '%s')"% \
                (i, row[0], row[1], row[2], row[3], row[4], row[5], row[6], row[7]))
        row = [fake.file_path(depth=3, extension=(random.choice(["pdf","mp4", "jpg", "png"])))]
        cursor.execute("INSERT INTO attachment_lowongan (lowongan_id, file_path) \
                VALUES (%s, '%s')" \
                 % (n, row[0]))
        n+=1;

for j in range (2):
    for i in jobseekers:
        row = [fake.file_path(depth=3,extension='pdf')[:120], fake.file_path(depth=3,extension='mp4')[:120], status_type[random.randint(0,1)],fake.paragraph()[:500].replace("'", ""), fake.date_time()]
        n=random.randint(1, 2*len(companies)-1)
        cursor.execute("INSERT INTO lamaran (user_id,lowongan_id,cv_path,video_path,stat,stat_reason,created_at) \
                VALUES (%s, %s, '%s', '%s', '%s', '%s', '%s')" \
                 % (i, n, row[0], row[1], row[2], row[3], row[4]))
        

cursor.close()
connection.close()