const template = `
  <div class="score-item">
    <span>{{ scoreitems.title }}</span>
    <div
      class="score-wrapper border rounded-lg d-flex flex-column justify-content-between mb-2"
    >
      <div class="progress-wrapper">
        <b-progress
          :value="scoreitems.score"
          :max="scoreitems.scoreLength"
          variant="success"
        ></b-progress>
        <i
          ref="target"
          class="bi bi-star-fill star"
          :class="{
            'animate__animated animate__heartBeat':
              scoreitems.score != prevScore,
          }"
        ></i>
      </div>
      <div class="score">
        <strong>{{ scoreitems.score }}/{{ scoreitems.scoreLength }}</strong>
      </div>
    </div>
  </div>
`;

export const ScoreBar = {
  inheritAttrs: false,
  template,
  name: "score-bar",
  props: {
    scoreitems: {
      type: Object,
      default: () => {},
    },
    prevScore: 0,
  },
  data() {
    return {};
  },
  watch: {
    "scoreitems.score"(newValue, oldValue) {
      if (newValue !== oldValue) {
        // when value of scoreitems.score changes, action is executed
        this.prevScore = newValue;
        setTimeout(() => {
          this.prevScore = oldValue;
        }, 100);
      }
    },
  },
};
