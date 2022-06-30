package common

import (
	"encoding/json"

	"flowerstore/model/dto"
	"fmt"
	"net/http"

	"github.com/pkg/errors"
)

type APIHelper interface {
	Success(response interface{}) error
	Failure(err error, statusCode int)
}

type apiHelper struct {
	w http.ResponseWriter
	r *http.Request
}

func NewAPIHelper(w http.ResponseWriter, r *http.Request) APIHelper {
	return &apiHelper{
		w: w,
		r: r,
	}
}

func (ah *apiHelper) Success(response interface{}) error {
	status := http.StatusOK
	ah.w.WriteHeader(status)
	if response != nil {
		body, err := json.Marshal(response)
		if err != nil {
			return errors.Wrap(err, "error marshal response")
		}
		if _, err := ah.w.Write(body); err != nil {
			return errors.Wrap(err, "error write body")
		}
	}
	return nil
}

func (ah *apiHelper) Failure(err error, statusCode int) {
	response := dto.FailureResponse{
		Message: fmt.Sprintf(`%q`, err.Error()),
	}
	body, _ := json.Marshal(response)

	ah.w.WriteHeader(statusCode)

	if _, err := ah.w.Write(body); err != nil {
		ah.w.Write([]byte(err.Error() + "\n"))
	}
}

type APIHelperFactory interface {
	NewAPIHelper(w http.ResponseWriter, r *http.Request) APIHelper
}

type apiHelperFactory struct {
}

func NewAPIHelperFactory() APIHelperFactory {
	return &apiHelperFactory{}
}

func (ahf *apiHelperFactory) NewAPIHelper(w http.ResponseWriter, r *http.Request) APIHelper {
	return NewAPIHelper(w, r)
}
