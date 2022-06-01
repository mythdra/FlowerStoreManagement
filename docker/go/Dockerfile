FROM golang:1.17.8

WORKDIR /usr/src/app

# pre-copy/cache go.mod for pre-downloading dependencies and only redownloading them in subsequent builds if they change
COPY ./BackEnd/go.mod ./

COPY ./BackEnd/go.sum ./

RUN go mod download && go mod tidy

COPY ./BackEnd/ ./
RUN go build -o main main.go

EXPOSE 3000

CMD ./main