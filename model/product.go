package model

type Flower struct {
	Name   string  `json:"name,omitempty"`
	Number int     `json:"number,omitempty"`
	Price  float32 `json:"price,omitempty"`
}
