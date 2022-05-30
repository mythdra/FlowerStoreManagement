package api

import (
	"encoding/json"
	"net/http"

	"flowerstore/api/products"
	"flowerstore/config"

	"github.com/go-chi/chi/v5"
)

func Init(r *chi.Mux) error {
	productAPI, err := products.InitAPI()
	if err != nil {
		return err
	}

	r.Get("/", Home)
	r.Post("/change-pass", func(w http.ResponseWriter, r *http.Request) {
		w.Write([]byte("change pass"))
	})
	r.Route("/products", func(r chi.Router) {
		r.Get("/", productAPI.GetProducts)
		r.Post("/", productAPI.PostProduct)

		r.Route("/{product_id}", func(r chi.Router) {
			r.Get("/", func(w http.ResponseWriter, r *http.Request) {
				w.Write([]byte("flower with id"))
			})
			r.Delete("/", func(w http.ResponseWriter, r *http.Request) {
				w.Write([]byte("Delete flower wit id"))
			})
			r.Put("/", func(w http.ResponseWriter, r *http.Request) {
				w.Write([]byte("update flower"))
			})
		})
	})

	r.Route("/bills", func(r chi.Router) {
		r.Get("/", func(w http.ResponseWriter, r *http.Request) {
			w.Write([]byte("list bills"))
		})
		r.Post("/", func(w http.ResponseWriter, r *http.Request) {
			w.Write([]byte("new bill"))
		})
		r.Put("/", func(w http.ResponseWriter, r *http.Request) {
			w.Write([]byte("update bill"))
		})
	})

	r.Post("/payment", func(w http.ResponseWriter, r *http.Request) {
		w.Write([]byte("payment"))
	})

	r.Get("/takings", func(w http.ResponseWriter, r *http.Request) {
		w.Write([]byte("takings"))
	})
	return nil
}

func Home(w http.ResponseWriter, r *http.Request) {
	ctx := r.Context()
	client := config.GetConnect()
	ref := client.NewRef("/")
	var data map[string]interface{}
	if err := ref.Get(ctx, &data); err != nil {
		// log.Fatalln("Error reading from database:", err)
		json.NewEncoder(w).Encode(err)
		return
	}
	json.NewEncoder(w).Encode(data)
}
