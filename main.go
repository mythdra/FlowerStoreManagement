package main

import (
	"flowerstore/api"
	"flowerstore/middleware"
	"net/http"

	"github.com/go-chi/chi/v5"
	"github.com/pkg/errors"
)

func NewRouter() (*chi.Mux, error) {
	r := chi.NewRouter()

	if err := middleware.Init(r); err != nil {
		return nil, errors.Wrap(err, "failed to initialize middlewares")
	}

	if err := api.Init(r); err != nil {
		return nil, errors.Wrap(err, "failed to initialize api")
	}

	return r, nil
}

func Run() error {
	router, err := NewRouter()
	if err != nil {
		return errors.Wrap(err, "error initializing router")
	}

	http.ListenAndServe(":3000", router)

	return nil
}

func main() {
	if err := Run(); err != nil {
		// TODO: implement logging
		panic(err)
	}
}
