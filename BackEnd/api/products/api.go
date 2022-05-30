package products

import (
	"flowerstore/common"
	"flowerstore/service"
	"net/http"
)

type API interface {
	GetProducts(w http.ResponseWriter, r *http.Request)
	PostProduct(w http.ResponseWriter, r *http.Request)
}

type api struct {
	p  service.ProductService
	ah common.APIHelperFactory
}

func NewAPI(
	p service.ProductService,
	ah common.APIHelperFactory,
) API {
	return &api{
		p:  p,
		ah: ah,
	}
}

func InitAPI() (API, error) {
	productService, err := service.NewProductService("/products")
	if err != nil {
		return nil, err
	}
	return NewAPI(productService, common.NewAPIHelperFactory()), nil
}
