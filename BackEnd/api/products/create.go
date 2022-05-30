package products

import (
	"encoding/json"
	"flowerstore/model"
	"net/http"
)

func (a *api) PostProduct(w http.ResponseWriter, r *http.Request) {
	apiHelper := a.ah.NewAPIHelper(w, r)
	var flower model.Flower
	err := json.NewDecoder(r.Body).Decode(&flower)
	if err != nil {
		apiHelper.Failure(err, http.StatusBadRequest)
		return
	}
	err = a.p.Create(r.Context(), &flower)
	if err != nil {
		apiHelper.Failure(err, http.StatusBadRequest)
		return
	}
	apiHelper.Success(flower)
}
