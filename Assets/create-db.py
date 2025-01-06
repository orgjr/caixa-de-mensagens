import sqlite3
import os

# Obtém o diretório onde o script está localizado
base_dir = os.path.dirname(__file__)  # diretório do script atual
db_path = os.path.join(base_dir, '../db/database.db')  # caminho relativo para o banco de dados

conn = sqlite3.connect(db_path)
cursor = conn.cursor()

# Cria a tabela "message" se não existir
cursor.execute ('''
CREATE TABLE IF NOT EXISTS message (
id INTEGER PRIMARY KEY AUTOINCREMENT,
content TEXT NOT NULL
)
''')

conn.commit()
conn.close()

