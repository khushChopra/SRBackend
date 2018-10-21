from flask import Flask, request, jsonify, json, Response
#import pyodbc
app = Flask(__name__)

connection_string = 'Driver={ODBC Driver 13 for SQL Server};Server=tcp:searchrescue.database.windows.net,1433;Database=searchrescue;Uid=piyushchoudhary@searchrescue;Pwd=piyush@123;Encrypt=yes;TrustServerCertificate=no;Connection Timeout=30;'


@app.route("/", methods=['GET', 'POST', 'PUT', 'DELETE'])
def hello():

	return "Hello Khush!"
"""
@app.route('/insert/<id>', methods=['POST'])
def hello12(id):
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("insert into first values(" + id+");")
	conn.commit()
	cur.close()
	conn.close()
	return "ID " +  str(id)+ " inserted\n"


### Users   

# create      POST  with json {"name": , "num": }

@app.route('/user', methods=['POST'])
def insertUser():
	if request.content_type!="application/json":
		return "Nhi hua\n"
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("insert into users values('" + request.json["name"]+ "','"+ request.json["num"]+  "')")
	print("insert into users values('" + request.json["name"]+ "','"+ request.json["num"]+  "')")
	conn.commit()
	cur.close()
	conn.close()
	return "Inserted\n"



# Read  all      GET      output is json {"num_of_entry":5 , "data" : {0:{},1:{}.....}  }

@app.route('/user', methods=['GET'])
def readAllUser():
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("select * from users")
	out = {"num_of_entry":0, "data" : dict()}
	for row in cur.fetchall():
		i = out["num_of_entry"] 
		out["data"][i] = {"name": row[0], "num": row[1]}
		out["num_of_entry"] = i+1

	cur.close()
	conn.close()
	return jsonify(out)


# Read  name from number      GET      

@app.route('/user/<qnum>', methods=['GET'])
def readUser(qnum):
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("select * from users where num ='"+qnum+"'")
	out = dict()
	i = 0
	for row in cur.fetchall():
		i = 1
		out = {"name": row[0], "num": row[1]}
	if i==0:
		return "Nhi chala"

	cur.close()
	conn.close()
	return jsonify(out)


# delete user with number      DELETE     

@app.route('/user/<qnum>', methods=['DELETE'])
def deleteUser(qnum):
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("delete from users where num ='"+qnum+"'")
	cur.commit()
	cur.close()
	conn.close()
	return "Success"



### Notification     create table notification(id char(10), title varchar(70), body varchar(250))   

# create      POST  with json {"id": , "title": , "body": }

@app.route('/noti', methods=['POST'])
def insertNotification():
	if request.content_type!="application/json":
		return "Nhi hua\n"
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("insert into notification values('" + request.json["id"]+ "','"+ request.json["title"]+ "','"+ request.json["body"]+  "')")
	conn.commit()
	cur.close()
	conn.close()
	return "Inserted\n"



# Read  all      GET      output is json {"num_of_entry":5 , "data" : {0:{},1:{}.....}  }

@app.route('/noti', methods=['GET'])
def readAllNotification():
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("select * from notification")
	out = {"num_of_entry":0, "data" : dict()}
	for row in cur.fetchall():
		i = out["num_of_entry"] 
		out["data"][i] = {"id": row[0], "title": row[1], "body": row[2]}
		out["num_of_entry"] = i+1

	cur.close()
	conn.close()              
	return jsonify(out)


# Read  name from number      GET     

@app.route('/noti/<qid>', methods=['GET'])
def readNotification(qid):
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("select * from notification where id ='"+qid+"'")
	out = dict()
	i = 0
	for row in cur.fetchall():
		i = 1
		out = {"id": row[0], "title": row[1], "body": row[2]}
	if i==0:
		return "Nhi chala"

	cur.close()
	conn.close()
	return jsonify(out)


# delete user with number      DELETE     

@app.route('/noti/<qid>', methods=['DELETE'])
def deleteNotification(qid):
	conn = pyodbc.connect(connection_string)
	cur = conn.cursor()
	cur.execute("delete from notification where id ='"+qid+"'")
	cur.commit()
	cur.close()
	conn.close()
	return "Success"





