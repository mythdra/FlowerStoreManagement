package dto

type PostFlowerRequest struct {
	Name   string  `json:"name"`
	Price  float32 `json:"price"`
	Number int     `json:"number"`
}
