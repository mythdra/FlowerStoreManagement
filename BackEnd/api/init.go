package api

import (
	"net/http"

	"github.com/go-chi/chi/v5"
)

func Init(r *chi.Mux) error {
	r.Get("/", func(w http.ResponseWriter, r *http.Request) {
		w.Write([]byte("hello"))
	})
	return nil
}
