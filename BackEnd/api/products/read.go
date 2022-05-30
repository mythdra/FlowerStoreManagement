package products

import (
	"encoding/json"
	"net/http"
)

func (a *api) GetProducts(w http.ResponseWriter, r *http.Request) {
	flowers, err := a.p.GetAll(r.Context())
	if err != nil {
		w.WriteHeader(http.StatusInternalServerError)
		w.Write([]byte(err.Error()))
		return
	}
	json.NewEncoder(w).Encode(flowers)
}
