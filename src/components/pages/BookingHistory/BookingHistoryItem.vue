<template>
  <div class="booking-history">
    <div class="booking-history_date d-flex justify-content-between align-items-center flex-wrap">
      <div class="created-date">
        <span class="text-primary-dark medium font-14 ml-sm-4 pl-sm-3">{{date}}</span>
        <span class="label-light ml-2 small semibold">{{time}}</span>
      </div>
      <div class="book-later">
        <span class="text-primary-dark medium font-14 pl-sm-3">{{$t("bookingHistory.rideDate")}} :</span>
        <span class="label-light ml-2 small semibold d-inline-block">{{journey_date}}</span>
        <span class="label-light ml-2 small semibold d-inline-block">{{ journey_time }}</span>
      </div>
    </div>
    <div class="bordered-box px-2 pt-4 px-lg-4 pb-lg-4 mt-3">
      <div class="row w-100 m-0 p-0">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.from")}}</p>
          <p class="semibold sm-text-medium lh-md">{{from}}</p>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.to")}}</p>
          <p class="semibold sm-text-medium lh-md">{{to}}</p>
        </div>
      </div>
      <div class="row mt-0 mt-lg-5 w-100 m-0 p-0">
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.Time")}}</p>
          <p class="semibold opacity-8 sm-text-small">{{tripTime}}</p>
        </div>
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.Rupees")}}</p>
          <p class="semibold opacity-8 sm-text-small">{{amount}}</p>
        </div>
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.Kilometers")}}</p>
          <p class="semibold opacity-8 sm-text-small">{{kilometers}}</p>
        </div>
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.noPerson")}}</p>
          <p class="semibold opacity-8 sm-text-small">{{persons}}</p>
        </div>
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.vehicleType")}}</p>
          <p class="semibold opacity-8 sm-text-small">{{vehicleType}}</p>
        </div>
        <div class="col-lg-2 col-sm-4 col-6 mb-3 mb-lg-0">
          <p class="label-light medium small mb-2">{{$t("bookingHistory.status")}}</p>
          <p class="semibold text-primary-dark sm-text-small">{{status}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default: null
    },
    date: {
      type: String,
      default: null
    },
    journey_date: {
      type: String,
      default: null
    },
    time: {
      type: String,
      default: null
    },
    journey_time: {
      type: String,
      default: null
    },
    from: {
      type: String,
      default: null
    },
    to: {
      type: String,
      default: null
    },
    tripTime: {
      type: String,
      default: null
    },
    amount: {
      default: null
    },
    persons: {
      type: String,
      default: null
    },
    kilometers: {
      type: String,
      default: null
    },
    vehicleType: {
      type: String,
      default: null
    },
    status: {
      type: String,
      default: null
    }
  }
};
</script>

<style lang="scss" scoped>
.booking-history {
  margin: 0 auto;
  margin-bottom: 60px;
}

.bordered-box {
  border: 2px solid rgba(2, 0, 28, 0.1);
  border-radius: 1px;
}

.label-light {
  color: rgba(2, 0, 28, 0.5);
  font-size: 14px;
  font-weight: 500;
}
.lh-md {
  line-height: 1.5em;
}

.semibold {
  font-weight: 600;
}

.font-14 {
  font-size: 14px;
}

.medium {
  font-weight: 500;
}
.text-primary-dark {
  color: #008022;
}
</style>
