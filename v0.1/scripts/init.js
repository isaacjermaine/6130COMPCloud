use crisp;

db.players.drop();
db.players.insertMany([{ '_id': 1, 'name': 'Mo Salah' }, { '_id': 2, 'name': 'Sadio Mane' }, { '_id': 3, 'name': 'Skel Etal' }, { '_id': 4, 'name': 'Po Tato'}]);

db.users.drop();
db.users.insertMany([{ '_id': 1, 'name': 'Cid', 'email': 'cid@gmail.com', 'address': '123 short road', 'favourite': 'Po Tato' }]);

db.codes.drop();
db.codes.insertMany([{ '_id': 1, 'code': 'ABCDE12345', 'voucher': 'VOUCH1','taken': 0}]);