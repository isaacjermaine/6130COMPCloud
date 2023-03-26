use('crisp');

db.createUser({user:'root',pwd:'snow',roles: [{role:'readWrite', db:'crisp'}]});

db = new Mongo().getDB("crisp");

db.players.drop();
db.createCollection('players', {capped:false});

db.players.insertMany([{ '_id': 1, 'name': 'Mo Salah' }, { '_id': 2, 'name': 'Sadio Mane' }, { '_id': 3, 'name': 'Skel Etal' }, { '_id': 4, 'name': 'Po Tato'}]);

//db.players.find({});

db.users.drop();
db.createCollection('users', {capped:false});

db.users.insertMany([{ '_id': 1, 'name': 'Cid', 'email': 'cid@gmail.com', 'address': '123 short road', 'favourite': 'Po Tato' }]);

db.codes.drop();
db.createCollection('codes', {capped:false});
db.codes.insertMany([{ '_id': 1, 'code': 'ABCDE12345', 'voucher': 'VOUCH1','taken': 0}]);
