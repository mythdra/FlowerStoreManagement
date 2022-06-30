package service

import (
	"context"
	"flowerstore/config"
	"flowerstore/model"

	"github.com/pkg/errors"
)

type ProductService interface {
	GetAll(ctx context.Context) (map[string]model.Flower, error)
	Create(ctx context.Context, flower *model.Flower) error
}

type productService struct {
	ref string
}

func NewProductService(ref string) (ProductService, error) {
	s := &productService{ref: ref}
	return s, nil
}

func (s *productService) GetAll(ctx context.Context) (map[string]model.Flower, error) {
	client := config.GetConnect()
	db := client.NewRef(s.ref)

	var product map[string]model.Flower
	if err := db.Get(ctx, &product); err != nil {
		return nil, errors.Wrap(err, "get db")
	}
	return product, nil
}

func (s *productService) Create(ctx context.Context, flower *model.Flower) error {
	client := config.GetConnect()
	db := client.NewRef(s.ref)

	_, err := db.Push(ctx, flower)
	if err != nil {
		return err
	}
	return nil
}
