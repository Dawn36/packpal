require("dotenv").config();
const express = require("express");
const app = express();
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: "*" },
});
var users = [];
io.on("connection", (socket) => {
    console.log("connection");

    ////////// chat work //////////////
    socket.on("connected", function (userId) {
        users[userId] = socket.id;
        io.emit("updateUserStatus", users);
        console.log(users);
    });
    //reciving for client
    socket.on("sendChatToSever", (data) => {
        console.log(data);
        //userId = parseInt(data.userId);
        room = parseInt(data.room);
        //console.log(room);
        //sending to client
        // users[userId]
        if (data.room == "") {
        } else {
            io.to(room).emit("sendChatToClient", data);
            io.emit("sendChatToClientA", data);
        }
    });
    socket.on("join-room", (room) => {
        socket.join(room);
    });

    socket.on("disconnect", (socket) => {
        let i = users.indexOf(socket.id);
        users.splice(i, 1, 0);
        io.emit("updateUserStatus", users);
        console.log("disconnect");
    });
});

server.listen(process.env.CHAT_PORT, () => {
    console.log("sever is running" + process.env.CHAT_PORT);
});
